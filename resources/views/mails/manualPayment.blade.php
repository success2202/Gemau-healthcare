
<!doctype html>
<html lang="en">
<body class="bg-white">
<div width="100%" style="margin:0;padding:0!important;background-color:#f5f6fa">
    <span style="width:100%;background-color:#f5f6fa">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tbody><tr>
                <td style="padding:30px 0">
                    <table style="width:100%;max-width:620px;margin:0 auto">
            <tbody>
            <tr>
                <td style="text-align:center;padding-bottom:15px">
                    <img style="max-height:50px;width:auto" src="{{asset('/images/'.$settings->site_logo)}}" alt="{{$settings->site_name}}" class="CToWUd">
                </td>
            </tr>
            </tbody>
        </table>
                        <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff">
            <tbody>
                    <tr>
                <td style="padding:10px 30px 10px">
                  
                </td>
                <tr>
                    <td style="padding:0 30px">
                        <p>Hello {{$data->name}}, We have generated the payment information for your order, click on the link below to complete payment</p>
                        <table width="100%">
                            <tbody>

                                <tr>
                                    <td width="150">Amount</td>
                                    <td width="25">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>{{ $data->amount }}</td>
                                </tr>
                                <tr>
                                    <td width="150">Products</td>
                                    <td width="25">&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                    <td>
                                     @php 
                                     if(is_array($data->products_name))
                                     {
                                        foreach($data->products_name as $items)
                                        {
                                            echo $items;

                                        }
                                     }
                                     @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <p>To Visit the payment link, <a href="{{$data->payment_link}}" class="btn btn-primary" target="_blank">Click Here</a> OR copy the link below and paste on a browser</p>
                                    <p>{{$data->payment_link}}</p>
                                </tr>
                    </tbody>
        </table>
                    <table style="width:100%;max-width:620px;margin:0 auto">

        <tbody>
        <tr>
            <td style="text-align:center;padding:25px 20px 0">
                <p style="font-size:13px">{{$settings->site_name}} © {{Date('Y')}}.</p>
                        </td>
        </tr>
        </tbody>
    </table>
                </td>
            </tr>
        </tbody></table>
    </span><div class="yj6qo"></div><div class="adL">
    </div></div>

</body>
</html>