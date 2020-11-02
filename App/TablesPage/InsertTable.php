<?php


namespace App\TablesPage;

use App\Database\Database;

class InsertTable extends Database
{
    const TABLE_NAME = 'homepage_content_message';

    protected $result;

    /**
     * @param string $msg
     * @return bool
     */
    public function getResult(string $msg): bool
    {
        $this->insertValue($msg, self::TABLE_NAME);

        return $this->result;
    }

    /**
     * @param string $msg
     * @param string $nameTable
     * @return bool
     */
    protected function insertValue($msg, $nameTable): bool
    {
        $this->takeValues();
        $this->startConnection($this->host, $this->user, $this->password, $this->nameDb);

        $check = true;

        $msg = $this->sanitizeMsg($msg, $this->mysqlHandle);
        $date = date("Y-m-d");

        $order = "insert into $nameTable (date, message) VALUES ('$date', '$msg')";

        if (!mysqli_query($this->mysqlHandle, $order)) {
            $check = false;
        }

        $this->closeDatabase($this->mysqlHandle);

        if ($check === false) {
            return $this->result = false;
        }

        return $this->result = true;
    }

    /**
     * @param string $msg
     * @param $mysql
     * @return string
     */
    protected function sanitizeMsg($msg, $mysql): string
    {
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);
        $msg = strip_tags($msg);
        $msg = mysqli_real_escape_string($mysql, $msg);

        return $msg;
    }
}