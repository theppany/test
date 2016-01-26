@include('layout.header')

<style>

    html #bar_code {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;

        text-indent: 0;
        width: 12.4em;
        font-size: 2em;
        text-align: center;
    }

    #megaStore {
        max-width: 600px;
        margin: 30px auto;
        padding-top: 30px;

    }

    #menu h2 {
        font-size: 1em;
        text-transform: uppercase;
        padding: 5px 10px;
    }

    #template img {
        margin: 5px 20px 0 0;
        float: left;
    }

    #template {
        width: 380px;
    }

    #template ol {
        float: left;
        margin: 0 0 0 30px;
        padding: 10px 10px 0 10px;
    }

    #template:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
    }

    #template .k-button {
        float: left;
        clear: left;
        margin: 5px 0 5px 12px;
    }
</style>

<script>


    $(document).ready(function () {




        $(".export-pdf").click(function() {
            // Convert the DOM element to a drawing using kendo.drawing.drawDOM
            kendo.drawing.drawDOM($(".content_export"))
                    .then(function(group) {
                        // Render the result as a PDF file
                        return kendo.drawing.exportPDF(group, {
                            paperSize: "auto",
                            margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
                        });
                    })
                    .done(function(data) {
                        // Save the PDF file
                        kendo.saveAs({
                            dataURI: data,
                            fileName: "HR-Dashboard.pdf",
                            proxyURL: ""
                        });
                    });
        });







    });
</script>
<div style="text-align: center">
    <input id="bar_code" class="k-textbox" placeholder="Card ID" type="text"/>
</div>

<div class="box-col">
    <button class='export-pdf k-button'>Export as PDF</button>
</div>
</div>

<div id="example" class="content_export">

    <table border="1">



        <tr><th></th>
        <th></th>
        <th></th>
        </tr>
      @foreach($result as $r)

  
        <tr>


            <td>{{$r->CardID}}</td>
            <td>{{$r->DatetimeCarIn}}</td>
            <td><img src="{{($r->PictureCarIn)}}"/></td>

        </tr>
       @endforeach
    </table>






</div>




@include('layout.footer')