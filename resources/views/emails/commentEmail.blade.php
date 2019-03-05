<html>
    <head>
        <style>
            td{
                width: 200px;
            }
        </style>
    </head>
    <body>
        <div class="journal-content-article"> 
            <div style="font-family:Arial, Helvetica, sans-serif; font-style: normal; font-weight: normal; font-size: 13px; vertical-align: top; text-align: left; background-color:#FFFFFF; width: 700px; ">
                <h1>Comment Received!</h1>
                <p>
                    You have received new comment on your video. You can view it at <a href="{{ $data['url'] }}">{{ $data['title'] }}</a>. 
                </p>
                <table id="tblMain" width="700" style="" border="0" cellspacing="0"> 
                    <tr>
                        <td style="padding: 20px;" width="479" valign="top">
                            <p>Respectfully,</p>
                            <p> </p>
                            <p>Youth Screen</p>
                            <p><a href="http://youthscreen.com/">Youth Screen</a></p>
                        </td> 
                    </tr>
                </table> 
            </div> 
        </div>
    </body>
</html>