<?php
if(!empty($guests ))
{
    $count = 1;
    $outputhead = '';
    $outputbody = '';
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="bordered striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Table Number</th>
                                <th>Arrived</th>
                                <th style="display:none;"></th>
                                <th style="display:none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                ';

    foreach ($guests as $guest)
    {
    //$body = substr(strip_tags($post->body),0,50)."...";
    //$show = url('blog/'.$post->slug);
    $arrived = "";
    if($guest->arrived){
        $arrived = "Arrived";
    }
    $outputbody .=  '

                            <tr>
		                        <td>'.$guest->first_name.'</td>
		                        <td>'.$guest->last_name.'</td>
		                        <td>'.$guest->company.'</td>
                            <td>'.$guest->email.'</td>
                            <td>'.$guest->table_number.'</td>
                            <td>'.$arrived.'</td>
                            <td style="display:none;">'.$guest->contact_number.'</td>
                            <td style="display:none;">'.$guest->id.'</td>
                            </tr>
                    ';

    }

    $outputtail .= '
                        </tbody>
                    </table>
                </div>';

    echo $outputhead;
    echo $outputbody;
    echo $outputtail;
 }

 else
 {
    echo 'Data Not Found';
 }
 ?>
