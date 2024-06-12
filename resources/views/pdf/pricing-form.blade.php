<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Báo giá Blue Agency</title>

        <style>
            body {
                font-family: DejaVu Sans;
            }

            .invoice-box {
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: DejaVu Sans;
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

            .invoice-box table tr.heading th {
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
                font-family: DejaVu Sans;
            }

            .invoice-box.rtl table {
                text-align: right;
            }

            .invoice-box.rtl table tr td:nth-child(2) {
                text-align: left;
            }

            #pricing-table {
                border-collapse: collapse;
                font-size: 12px;
            }

            #pricing-table th {
                border: 1px solid black;
                text-align: center;
                font-size: 14px;
            }

            #pricing-table td {
                border: 1px solid black;
                text-align: center;
                vertical-align: middle;
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
                                    <img src="{{ public_path('images/logo-2.png') }}"
                                         style="width: 100%; max-width: 300px"/>
                                </td>

                                <td>
                                    Bảng báo giá<br/>
                                    Tạo vào ngày: {{ \Carbon\Carbon::now()->format('d/m/Y') }}<br/>
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
                                    Blue Agency VN<br/>
                                    51 Nguyễn Cư Trinh<br/>
                                    Phường Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh<br>
                                    MST: 0316522066
                                </td>

                                <td>
                                    Người đại diện: Phùng Đức Hoàng<br/>
                                    Chức vụ: Giám Đốc<br/>
                                    Email: info@blueagency.vn / ketoan@blueagency.vn
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
                                    <p>Chúng tôi rất trân trọng cơ hội được cung cấp cho bạn bảng dự toán chi phí cho
                                        các dịch vụ đã yêu cầu. Vui lòng xem lại chi tiết dưới đây:</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div style="page-break-after: always;"></div>
        @php
            $availablePlatforms = [];
            $platformData = [];
            foreach ($providers as $provider) {
                foreach ($provider->platforms as $platform) {
                    if ($platform->pivot->followers > 0) {
                        $availablePlatforms[$platform->id] = $platform->name;
                        $platformData[$platform->id][$provider->id] = [
                            'followers' => customPriceFormat($platform->pivot->followers),
                            'link' => $platform->pivot->link,
                            'booking_price' => customPriceFormat($platform->pivot->booking_price)
                        ];
                    }
                }
            }
        @endphp

        <table id="pricing-table" aria-description="pricing table">
            <caption style="display: none">pricing table</caption>
            <thead>
                <tr class="heading">
                    <th rowspan="2" style="width: 5%">STT</th>
                    <th rowspan="2" style="width: 5%">Brand Chọn</th>
                    <th rowspan="2" style="width: 10%">Blue Agency Recommend</th>
                    <th rowspan="2" style="min-width: 14%">Tên</th>
                    <th rowspan="2" style="min-width: 14%">Lĩnh Vực</th>
                    <th rowspan="2" style="min-width: 14%">Khu Vực</th>

                    @foreach($availablePlatforms as $availablePlatform => $name)
                        <th colspan="3" style="text-align: center">{{ $name }}</th>
                    @endforeach
                </tr>
                <tr class="heading">
                    @foreach($availablePlatforms as $availablePlatform => $name)
                        <th style="text-align: center">Follow</th>
                        <th style="text-align: center">Link</th>
                        <th style="text-align: center">Giá Booking</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach($providers as $provider)
                    <tr class="item">
                        <td style="text-align: center">{{ $loop->index + 1 }}</td>
                        <td style="text-align: center">
                            <input type="checkbox">
                        </td>
                        <td style="text-align: center">
                            <input type="checkbox">
                        </td>
                        <td>{{ $provider->name }}</td>
                        <td>{{ implode(', ',$provider->fields()->pluck('name')->toArray()) }}</td>
                        <td>{{ implode(', ',$provider->areas()->pluck('name')->toArray()) }}</td>

                        @foreach($availablePlatforms as $availablePlatform => $name)
                            <td style="text-align: center">
                                @if(isset($platformData[$availablePlatform][$provider->id]))
                                    {{ $platformData[$availablePlatform][$provider->id]['followers'] }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if(isset($platformData[$availablePlatform][$provider->id]))
                                    {{ $platformData[$availablePlatform][$provider->id]['link'] }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if(isset($platformData[$availablePlatform][$provider->id]))
                                    {{ $platformData[$availablePlatform][$provider->id]['booking_price'] }}đ
                                @else
                                    N/A
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
