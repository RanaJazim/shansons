<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Daybook</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .bold {
            font-weight: bolder;
        }
        @media print {
            #printReport {
                display: none;
            }
        }
    </style>

</head>
<body>

    @php
        $total_balance_for_daybook = 0;
    @endphp
    
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center" style="font-weight: bolder">
                SHANSONS'S ENGINEERING WORK
            </h3>
        </div>
    </div>

    <div class="table-responsive container">
        <table class="table table-hover table-bordered">
            <tr>
                <td class="text-center">Voucher Number 4</td>
                <td class="text-center bold">Date</td>
                <td class="text-center bold">6-Mar-20</td>
            </tr>

            <tr>
                <td class="text-center bold">DETAILS</td>
                <td class="text-center bold">DEBIT</td>
                <td></td>
            </tr>

            {{-- Similar --}}
            <tr>
                <td class="bold">Opening Balance</td>
                <td></td>
                <td class="bold text-center">4100000</td>
            </tr>
            <tr>
                <td class="bold">
                    Check received Al-Khas Engineering Works
                </td>
                <td></td>
                <td class="bold text-center">52000</td>
            </tr>
            <tr>
                <td class="bold">
                    Check received for Daybook
                </td>
                <td></td>
                <td class="bold text-center">20000</td>
            </tr>
            {{-- /Similar --}}

            <tr>
                <td class="bold">Total Balance</td>
                <td></td>
                <td class="bold text-center">41700000</td>
            </tr>

            {{-- Daybook categories portion --}}
            @foreach ($categories as $category)
                @if (count($category->daybooks) > 0)
                    <div>
                        <tr>
                            <td class="bold">
                                {{ $category->name }}
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach ($category->daybooks as $daybook)
                            <tr>
                                <td>{{ $daybook->description }}</td>
                                <td class="text-center">
                                    {{ $daybook->price }}
                                </td>
                                <td></td>
                            </tr>
                            @php
                                $total_balance_for_daybook += $daybook->price
                            @endphp
                        @endforeach
                    </div>
                @endif
            @endforeach
            {{-- /Daybook categories portion --}}

            {{-- last section i.e total balaance --}}
            <tr>
                <td class="bold">Total Balance</td>
                <td class="bold text-center">
                    {{ $total_balance_for_daybook }}
                </td>
                <td class="bold text-center">120000</td>
            </tr>
            {{-- /last section i.e total balaance --}}

        </table>
    </div>

    <div class="container">
        <button 
            class="btn btn-info"
            id="printReport" 
            onClick="window.print();"
        >
            Print Report
        </button>
    </div>

</body>
</html>