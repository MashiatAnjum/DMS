<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{$user->name}}'s Monthely Bill </title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('img/logo2.png') }}" style="width: 100%; max-width: 300px" />
                            </td>

                            <td>
                               
                                Created: <span id="createdDate"></span><br />
                                Due: <span id="dueDate"></span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{$user->name}}<br />
                                {{$user->email}}<br />
                                12345 Sunny Road<br />
                                Dhaka,1212
                            </td>

                            
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Check/Cash</td>
            </tr>

            <tr class="details">
                <td>Check</td>

                <td>1000</td>
            </tr>

            <tr class="heading">
                <td>Item</td>

                <td>Bill</td>
            </tr>

            <tr class="item">
                <td>{{$plan->plan_name}} ({{$plan->description}})</td>

                <td>{{$plan->price}}</td>
            </tr>

            <tr class="item">
                <td>Extra Services</td>

                <td>1000.00</td>
            </tr>

            <tr class="item last">
                <td>Internet Bill</td>

                <td>500.00</td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total Bill: {{ $plan->price + 1000.00 + 500.00  }}.00</td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
    </script>
    <script>
        document.getElementById('createdDate').innerText = new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        var dueDate = new Date();
        dueDate.setMonth(dueDate.getMonth() + 1);
        document.getElementById('dueDate').innerText = dueDate.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    </script>
</body>

</html>