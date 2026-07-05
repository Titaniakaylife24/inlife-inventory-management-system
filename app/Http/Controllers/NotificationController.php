<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public static function getNotifications()
    {
        $notifications = [];

        $role = Auth::user()->role->name;

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if($role == 'Admin'){

            $pending = Borrowing::where('status','Pending')->count();

            if($pending){

                $notifications[] = [

                    'icon'=>'fa-file-signature',

                    'title'=>"$pending Borrow Request Pending",

                    'url'=>route('borrow-request.index')

                ];

            }

            $lowStock = Product::whereColumn(
                'stock',
                '<=',
                'minimum_stock'
            )->count();

            if($lowStock){

                $notifications[]=[

                    'icon'=>'fa-box',

                    'title'=>"$lowStock Assets Low Stock",

                    'url'=>route('stock.index')

                ];

            }

            $returned = Borrowing::where(
                'status',
                'Returned'
            )->count();

            if($returned){

                $notifications[]=[

                    'icon'=>'fa-rotate-left',

                    'title'=>"$returned Returned Assets",

                    'url'=>route('borrow-request.index')

                ];

            }

        }

        /*
        |--------------------------------------------------------------------------
        | STAFF
        |--------------------------------------------------------------------------
        */

        if($role == 'Staff'){

            $pending = Borrowing::where('status','Pending')->count();

            if($pending){

                $notifications[]=[

                    'icon'=>'fa-file-signature',

                    'title'=>"$pending Borrow Request",

                    'url'=>route('borrow-request.index')

                ];

            }

            $low = Product::whereColumn(
                'stock',
                '<=',
                'minimum_stock'
            )->count();

            if($low){

                $notifications[]=[

                    'icon'=>'fa-box',

                    'title'=>"$low Low Stock",

                    'url'=>route('stock.index')

                ];

            }

        }

        /*
        |--------------------------------------------------------------------------
        | EMPLOYEE
        |--------------------------------------------------------------------------
        */

        if($role == 'Employee'){

            $approved = Borrowing::where(

                'user_id',Auth::id()

            )->where('status','Approved')->count();

            if($approved){

                $notifications[]=[

                    'icon'=>'fa-circle-check',

                    'title'=>"$approved Borrow Approved",

                    'url'=>route('myborrow.index')

                ];

            }

            $rejected = Borrowing::where(

                'user_id',Auth::id()

            )->where('status','Rejected')->count();

            if($rejected){

                $notifications[]=[

                    'icon'=>'fa-circle-xmark',

                    'title'=>"$rejected Borrow Rejected",

                    'url'=>route('myborrow.index')

                ];

            }

        }

        return $notifications;

    }
}