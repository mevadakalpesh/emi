<?php

namespace App\Http\Controllers;

use App\Models\LoanDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

use Illuminate\Database\Schema\Blueprint;

class LoanController extends Controller
{
  
  public function loadDetails() {

    $details = LoanDetails::get();
    return view('load.load-details', [
      'details' => $details
    ]);
  }


  public function emiDetails() {

    $table = "emi_details";
    $loanData = LoanDetails::get();
    $months = [];
    $data = [];

    if ($loanData) {
      foreach ($loanData as $page) {
        $createdAt = Carbon::createFromFormat('Y-m-d', $page['first_payment_date']);
        $updatedAt = Carbon::createFromFormat('Y-m-d', $page['last_payment_date']);
        while ($createdAt->lessThanOrEqualTo($updatedAt)) {
          $monthName = $createdAt->format('Y') . '_' . strtolower($createdAt->format('M'));
          $months[] = $monthName;
          
          array_push($data, [
            "clientid" => $page['clientid'],
            $monthName => number_format($page['loan_amount'] /
            $page['num_of_payment'],2)
          ]);

          $createdAt->addMonth();
        }

      }
    }

    $months = array_unique($months);
    if (Schema::hasTable($table)) {
      Schema::drop($table);
    }

    Schema::create($table, function (Blueprint $table) use ($months) {
      $table->id();
      $table->bigInteger('clientid');
      if ($months) {
        foreach ($months as $month) {
          $table->decimal($month, 8, 2)->default(0);
          }
        }
        $table->timestamps();
      });


      if ($data) {
        foreach ($data as $key => $clientData) {
          DB::table($table)->updateOrInsert(
            ['clientid' => $clientData['clientid']],
            $clientData
          );
        }
      }

      $getRecords = DB::table($table)->get()->toArray();
      return view('load.emi-details', [
        'heading' => $months,
        'data' => $getRecords
      ]);


    }

  }