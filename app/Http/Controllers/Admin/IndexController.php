<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller {
	public function index()
	{
		$sysinfo = $this->system();
		return view('admin.index.admin', ['sysinfo'=>$sysinfo]);
	}

	public function system()
	{
		$sysinfo = array(
            'os' => php_uname() , //获取服务器标识的字串
            'version' => PHP_VERSION, //获取PHP服务器版本
            'action' => php_sapi_name() , //获取Apache服务器版本
            'time' => date("Y-m-d H:i:s", time()), //获取服务器时间
            'max_upload' => ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled", //最大上传
            'max_ex_time' => ini_get("max_execution_time") . "秒", //脚本最大执行时间
            'mysql_version' => $this->_mysql_version(),
            'mysql_size' => $this->_mysql_db_size(),
        );

        return $sysinfo;
	}

	private function _mysql_version()
    {
        $version = DB::select("select version() as ver");
        return $version[0]->ver;
    }

    private function _mysql_db_size()
    {
        $sql = "SHOW TABLE STATUS FROM `" . config('database.connections')['mysql']['database']."`";
        $tblPrefix = config('database.connections')['mysql']['prefix'];
        if ($tblPrefix != null) {
            $sql .= " LIKE '{$tblPrefix}%'";
        }
        $row = DB::select($sql);
        // var_dump($row);die;
        $size = 0;
        foreach ($row as $value) {
            $size += $value->Data_length + $value->Index_length;
        }
        return round(($size / 1048576), 2) . 'M';
    }
}