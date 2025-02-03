<?
namespace cUtils;


class cUtils {

    // Output data to user/ frontend
    public static function outputData ($status=false, $data, $exit =false, $httpStatus=200) 
    {
        if ($data == null) {
            $data = array();
        }

        http_response_code($httpStatus);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);

        foreach (get_defined_vars() as $var) {
            unset($var);
        }

        if ($exit == true) {
            exit();
        }
    }
    // End of method


    // return data to be used in program
    public static function returnData ($status= false, $data=array(), $exit = false, $httpStatus) 
    {
        $output = array(
            'status' => $status,
            'data' => $data,
            'status_code' => $httpStatus
        );
        return json_encode($output);

        foreach (get_defined_vars() as $var) {
            unset($var);
        }

        if ($exit == true) {
            exit();
        }
    }
    // End of method


    // Error Handler
    public static function errorMessage ($number)
    {
        $error = array(
            'number' => $number,
            'error' => true // Maybe, maybe not :)
        );

        return $error;
    } 

    

}