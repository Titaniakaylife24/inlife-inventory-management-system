<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Inventory Report</title>

<style>

*{
    font-family: DejaVu Sans, sans-serif;
    box-sizing:border-box;
}

body{
    font-size:11px;
    color:#374151;
    margin:30px;
}

.header{
    width:100%;
    margin-bottom:20px;
    border-bottom:3px solid #a21caf;
    padding-bottom:15px;
}

.header table{
    width:100%;
    border:none;
}

.header td{
    border:none;
    vertical-align:middle;
}

.logo{
    width:85px;
}

.system-name{
    font-size:24px;
    font-weight:bold;
    color:#a21caf;
}

.system-subtitle{
    font-size:13px;
    color:#6b7280;
}

.report-title{

    margin-top:10px;

    font-size:22px;

    font-weight:bold;

    color:#111827;

}

.report-info{

    margin-top:6px;

    color:#6b7280;

    font-size:11px;

}

.summary{

    width:100%;

    border:none;

    margin-bottom:25px;

}

.summary td{

    border:1px solid #d1d5db;

    width:25%;

    text-align:center;

    padding:14px;

    background:#f8fafc;

}

.summary-title{

    color:#6b7280;

    font-size:11px;

}

.summary-value{

    margin-top:8px;

    font-size:24px;

    font-weight:bold;

    color:#111827;

}

table.inventory{

    width:100%;

    border-collapse:collapse;

}

table.inventory th{

    background:#f3f4f6;

    border:1px solid #d1d5db;

    padding:8px;

    font-size:11px;

    text-align:center;

}

table.inventory td{

    border:1px solid #d1d5db;

    padding:7px;

    font-size:10px;

}

.center{

    text-align:center;

}

.footer{

    position:fixed;

    bottom:-15px;

    left:0;

    right:0;

    text-align:center;

    color:#6b7280;

    font-size:10px;

}

</style>

</head>

<body>

<div class="header">

<table>

<tr>

<td width="12%">

<img
src="{{ public_path('images/logo_inlife.png') }}"
class="logo">

</td>

<td>

<div class="system-name">

INLIFE

</div>

<div class="system-subtitle">

Inventory Management System

</div>

<div class="report-title">

Inventory Report

</div>

<div class="report-info">

Generated :
{{ now()->format('d F Y H:i') }}

<br>

Total Assets :
{{ $products->count() }}

</div>

</td>

</tr>

</table>

</div>

<table class="summary">

<tr>

<td>

<div class="summary-title">

Total Assets

</div>

<div class="summary-value">

{{ $products->count() }}

</div>

</td>

<td>

<div class="summary-title">

Available

</div>

<div class="summary-value">

{{ $products->where('status','Available')->count() }}

</div>

</td>

<td>

<div class="summary-title">

Borrowed

</div>

<div class="summary-value">

{{ $products->where('status','Borrowed')->count() }}

</div>

</td>

<td>

<div class="summary-title">

Low Stock

</div>

<div class="summary-value">

{{ $products->filter(fn($item)=>$item->stock <= $item->minimum_stock)->count() }}

</div>

</td>

</tr>

</table>

<table class="inventory">

    <thead>

        <tr>

            <th width="10%">Code</th>

            <th width="22%">Asset</th>

            <th width="13%">Category</th>

            <th width="13%">Location</th>

            <th width="8%">Stock</th>

            <th width="10%">Minimum</th>

            <th width="12%">Condition</th>

            <th width="12%">Status</th>

        </tr>

    </thead>

    <tbody>

    @forelse($products as $product)

        <tr>

            <td class="center">
                {{ $product->code }}
            </td>

            <td>

                <strong>{{ $product->name }}</strong>

                <br>

                <span style="font-size:9px;color:#6b7280;">

                    {{ $product->brand }}

                </span>

            </td>

            <td>

                {{ optional($product->category)->name }}

            </td>

            <td>

                {{ optional($product->location)->name }}

            </td>

            <td class="center">

                {{ $product->stock }}

            </td>

            <td class="center">

                {{ $product->minimum_stock }}

            </td>

            <td class="center">

                @if($product->condition=='Good')

                    <span style="color:#16a34a;font-weight:bold;">
                        Good
                    </span>

                @elseif($product->condition=='Fair')

                    <span style="color:#ca8a04;font-weight:bold;">
                        Fair
                    </span>

                @elseif($product->condition=='Damaged')

                    <span style="color:#dc2626;font-weight:bold;">
                        Damaged
                    </span>

                @else

                    {{ $product->condition }}

                @endif

            </td>

            <td class="center">

                @if($product->status=='Available')

                    <span style="color:#16a34a;font-weight:bold;">
                        Available
                    </span>

                @elseif($product->status=='Borrowed')

                    <span style="color:#d97706;font-weight:bold;">
                        Borrowed
                    </span>

                @elseif($product->status=='Maintenance')

                    <span style="color:#dc2626;font-weight:bold;">
                        Maintenance
                    </span>

                @else

                    {{ $product->status }}

                @endif

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="8" class="center" style="padding:25px;">

                No inventory report data available.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<br><br>

<table style="width:100%;border:none;">

<tr>

<td style="border:none;">

    <strong>Report Notes</strong>

    <br><br>

    This report was automatically generated by the
    <strong>INLIFE Inventory Management System</strong>.
    The information presented reflects the latest inventory
    records available at the time of report generation.

</td>

<td style="border:none;text-align:right;vertical-align:top;">

    <strong>Generated By</strong>

    <br>

    {{ auth()->user()->name ?? 'Staff' }}

    <br><br>

    _______________________

</td>

</tr>

</table>

<div class="footer">

INLIFE Inventory Management System

&nbsp;&nbsp;|&nbsp;&nbsp;

Inventory Report

&nbsp;&nbsp;|&nbsp;&nbsp;

Generated on

{{ now()->format('d F Y H:i') }}

</div>

</body>

</html>