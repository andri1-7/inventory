<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('array_to_csv'))
{
    function string_to_csv($content, $filename = "", $params = array())
    {
        if ($filename != "")
        {
            if ( isset($params['content_type']) )
            {
                $content_type = $params['content_type'];
            }
            else
            {
                $content_type = 'application/excel';
            }

            header('Content-Type: '.$content_type);
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header("Content-Length: ".strlen($content));
        }

        echo $content;
    }

    function array_to_csv($content, $filename = "")
    {
        if ($download != "")
        {
            header('Content-Type: application/csv');
            header('Content-Disposition: inline; filename="' . $download . '"');
            header('Content-Disposition: inline; filename="' . $download . '"');
            header("Content-Length: ".strlen($content));
        }

        echo $str;
    }
}

if ( ! function_exists('query_to_csv'))
{
    function query_to_csv($query, $headers = TRUE, $download = "")
    {
        if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
        {
            show_error('invalid query');
        }

        $array = array();

        if ($headers)
        {
            $line = array();
            foreach ($query->list_fields() as $name)
            {
                $line[] = $name;
            }
            $array[] = $line;
        }

        foreach ($query->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

        echo array_to_csv($array, $download);
    }
}
