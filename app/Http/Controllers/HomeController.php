<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{

    public function index(Request $request)
    {

$data = '{
  "success": true,
  "message": "Success",
  "error_code": 200,
  "data": [
    {
      "student_id": "115",
      "name": "ellen irma",
      "age": "32",
      "email": "elen@yahoo.com",
      "image": "123.png",
      "date_created": "2019-10-21 07:49:23"
    },
    {
      "student_id": "116",
      "name": "lucy cruz",
      "age": "24",
      "email": "lucy@yahoo.com",
      "image": "43.png",
      "date_created": "2019-10-30 07:49:23"
    },
    {
      "student_id": "118",
      "name": "macmac",
      "age": "32",
      "email": "mac@yahoo.com",
      "image": "mac.png",
      "date_created": "2019-10-15 07:49:23"
    },
    {
      "student_id": "119",
      "name": "uyiyu",
      "age": "56",
      "email": "fgfre@yahoo.com",
      "image": "yg.png",
      "date_created": "2019-10-04 07:49:23"
    },
    {
      "student_id": "120",
      "name": "uyiyu",
      "age": "56",
      "email": "fgfre@yahoo.com",
      "image": "yg.png",
      "date_created": "2019-10-15 07:49:23"
    },
    {
      "student_id": "126",
      "name": "hahah",
      "age": "23",
      "email": "sdf@yahoo.com",
      "image": "yg.png",
      "date_created": "2019-10-15 07:49:23"
    },
    {
      "student_id": "130",
      "name": "uyiyu",
      "age": "56",
      "email": "fgfre@yahoo.com",
      "image": "yg.png",
      "date_created": "2019-08-12 07:49:23"
    },
    {
      "student_id": "131",
      "name": "qwerty",
      "age": "21",
      "email": "qwerty@yahoo.com",
      "image": "ahoo.png",
      "date_created": "2019-10-15 07:49:23"
    },
    {
      "student_id": "132",
      "name": "joee",
      "age": "20",
      "email": "joe@yahoo.com",
      "image": "yahoo",
      "date_created": "2019-08-20 07:49:23"
    },
    {
      "student_id": "136",
      "name": "oraclesee",
      "age": "55",
      "email": "email@test.com",
      "image": "oracle.jpg",
      "date_created": "2019-10-15 07:49:23"
    },
    {
      "student_id": "138",
      "name": "gotabrand",
      "age": "23",
      "email": "gotabrand@com.com",
      "image": "yahoo.png",
      "date_created": "2019-09-11 07:49:23"
    },
    {
      "student_id": "139",
      "name": "gotabrandnewsdfsdf",
      "age": "343",
      "email": "testandy@seasolutions.com",
      "image": "yahoo.png",
      "date_created": "2019-10-15 07:49:23"
    },
    {
      "student_id": "140",
      "name": "Bruce Wayne",
      "age": "32",
      "email": "batman@gmail.com",
      "image": "bat.png",
      "date_created": "2019-09-09 07:49:23"
    },
    {
      "student_id": "141",
      "name": "Bruce Wayne",
      "age": "32",
      "email": "batman@gmail.com",
      "image": "bat.png",
      "date_created": "2019-09-20 07:49:23"
    },
    {
      "student_id": "142",
      "name": "raj",
      "age": "25",
      "email": "raj@yahoo.com",
      "image": null,
      "date_created": "2019-12-01 19:56:29"
    }
  ]
}';


    $items = json_decode($data)->data;

 // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($items);
 
        // Define how many items we want to be visible in each page
        $perPage = 7;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        // $paginatedItems->setPath($request->url());

        // $paginatedItems->items();

        // $paginatedItems->cout();

        // $paginatedItems->lastpage();



        return view("home");
    }

    public function store(Request $request)
    {
        echo '<pre>';
        print_r($request->input("crop_input"));
        echo '</pre>';
    }

    public function show(Home $home)
    {
        //
    }

    public function edit(Home $home)
    {
        //
    }

    public function update(Request $request, Home $home)
    {
        //
    }

    public function destroy(Home $home)
    {
        //
    }
}
