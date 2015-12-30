@include('layout.header')
<style>

    .tableStyling td{

        padding: 10px 10px 10px 10px;
    }


</style>
<div align="center">

    <div class="k-block extended auto" style="width: 25%">

<form action="" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="tableStyling" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>ຊື່ຜູ້ໃຊ້:</td>
                <td><input type="textbox" class="k-textbox" name="username" id="username" value="" style="width:100%"></td>
            </tr>
            <tr>
                <td>ລະຫັດຜ່ານ:</td>
                <td><input type="password" class="k-textbox" name="password" id="password" style="width:100%"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td align="right"><button class="k-button k-primary" type="submit">ເຂົ້າສູ່ລະບົບ</button></td>
            </tr>
        </table>
    </form>
    </div>
</div>

@include('layout.footer')