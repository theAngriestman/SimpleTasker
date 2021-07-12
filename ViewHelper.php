<?php


class ViewHelper
{
    public function timestatmp_to_date($timestamp)
    {
        if($timestamp) {
            return date('d-m-Y', $timestamp);
        }
    }
    public function timestatmp_to_datetime($timestamp)
    {
        if($timestamp){
            return date('d-m-Y H:i:s', $timestamp);
        }
    }

    public function dump($data)
    {
        highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    }

    public function array_to_table($arr)
    {
        if (count($arr)) {
            $table = '<table>';
            foreach ($arr as $item) {
                $table .= '<tr>';
                if (is_array($item)) {
                    foreach ($item as $_item) {
                        $table .= '<td>' . $_item . '</td>';
                    }
                }else{
                    $table .= '<td>' . $item . '</td>';
                }
                $table .= '</tr>';
            }
            $table .= '</table>';
            echo $table;
        }
    }
}