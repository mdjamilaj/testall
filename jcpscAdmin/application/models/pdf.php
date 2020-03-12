<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pdf extends CI_Model {


	function pdf1($data)
	{
            // var_dump($data);
            // $result = 'hello'.$data['title_english'].'how are you';
            $result = '<!DOCTYPE html>
            <html lang="en">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
            @font-face {
              font-family: SolaimanLipi;
              font-style: normal;
              font-weight: normal;
              src: url(http://files.ekushey.org/Ekushey_OpenType_Bangla_Fonts/SolaimanLipi_22-02-2012.ttf) format(\'true-type\');
            }
            </style>
          
        </head>
        <body>
            <div class="container" style="width: 700px;margin: auto;padding: 20px 0px;">
                <h2 style="text-align: center;padding: 5px;margin: 0px;width: 100px;margin: auto;border-bottom-style: double; letter-spacing: 3px; margin-bottom: 15px;">Notice </h2>
                <h4 style="text-align: center;padding: 1px;padding-bottom: 0px;margin: 0;word-spacing: 2px;letter-spacing: 1px;">'.$data['title_english'].'</h4>
                <h4  style="font-family: SolaimanLipi; text-align: center; padding: 7px 0px; margin: 0;">'.$data['title_bangla'].'</h4>
        
                <div>
                    <p style="margin-top: 30px; margin-bottom: 15px;">'.$data['des_english'].'</p>
                    <p style="font-family: SolaimanLipi">'.$data['des_bangla'].'</p>
                    <p style="font-family: SolaimanLipi">আস্ফাস্ফাস্ফাদ সদফাদস্ফাফাদস্ফ স্ফাদফ</p>
                </div>
        
                <div style="margin-top:40px;">
                    <div style="float: left; text-align: left;">
                        <h4 style="margin: 0; font-weight: 300;">Name Of Creator</h4>
                        <h5 style="text-align: center; margin: 0; margin-top: 5px;">'.$data['creator'].'</h5>
                    </div>
                    <div style="float: right; text-align: right">
                    <h5>Date : '.$data['notice_date'].'</h5>
                    </div>
                </div>
        
            </div>
        </body>
        </html>';

        $result1 = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
        @font-face {
          font-family: SolaimanLipi;
          font-style: normal;
          font-weight: normal;
          src: url(http://files.ekushey.org/Ekushey_OpenType_Bangla_Fonts/SolaimanLipi_22-02-2012.ttf) format(\'true-type\');
        }
        </style>
            <title>dsfdsf</title>
        </head>
        <body>
        <table style="width: 700px; margin: auto;">
            
            <thead>
              <tr>
                <th>&nbsp;</th>
                <td style="font-family: SolaimanLipi">আস্ফাস্ফাস্ফাদ সদফাদস্ফাফাদস্ফ স্ফাদফ</td>
                <th>Wingding</th>
                <th>Whatsit</th>
                <th>Whirlygig</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                <td>CompanyA</td>
                <td>5</td>
                <td>8</td>
                <td>0</td>
                <td>0</td>
              </tr>
              <tr>
                <td>CompanyB</td>
                <td>2</td>
                <td>0</td>
                <td>3</td>
                <td>4</td>
              </tr>
              <tr>
                <td>CompanyC</td>
                <td>0</td>
                <td>7</td>
                <td>2</td>
                <td>0</td>
              </tr>
              <tr>
                <td>CompanyD</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>3</td>
              </tr>
              <tr>
                <td>CompanyE</td>
                <td>3</td>
                <td>0</td>
                <td>3</td>
                <td>0</td>
              </tr>
              <tr>
                <td><strong>Grand Total</strong></td>
                <td>10</td>
                <td>15</td>
                <td>8</td>
                <td>7</td>
              </tr>
          </tbody>
          <caption>Products purchased last month</caption>
        </table>
        </body>
        </html>
        ';
            // var_dump($result);

			return $result1;

	}
}

  // <meta charset="UTF-8">
            // <meta name="viewport" content="width=device-width, initial-scale=1.0">
            // <title>Notice</title>
            // <style type="text/css">
            //     @page {
            //         margin: 0;
            //     }
            //     * { padding: 0; margin: 0; }
            //     @font-face {
            //         font-family: "source_sans_proregular";           
            //         src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
            //         font-weight: normal;
            //         font-style: normal;

            //     }        
            //     body{
            //         font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;            
            //     }
            // </style>