<?php
namespace App\TablesPage;

use App\Database\Database;

class ReadTables extends Database
{
    protected $result;

    const STRING_CONCATENATION = "|";

    /**
     * @param string $table
     * @param string $pageForm
     * @param string $pageContent
     * @return array
     */
    public function getResult(string $table, string $pageForm, string $pageContent): array
    {
        $this->readTableValue($table, $pageForm, $pageContent);
        return $this->result;
    }

    /**
     * @param string $table
     * @param string $pageForm
     * @param string $pageContent
     * @return array
     */
    protected function readTableValue(string $table, string $pageForm, string $pageContent): array
    {
        $this->takeValues();
        $this->startConnection($this->host, $this->user, $this->password, $this->nameDb);
        $resultFun = $this->sqlOrder($table, $pageForm, $pageContent);
        $this->closeDatabase($this->mysqlHandle);
        return $this->result = $resultFun;
    }

    /**
     * @param string $table
     * @param string $pageForm
     * @param string $pageContent
     * @return array
     */
    protected function sqlOrder(string $table, string $pageForm, string $pageContent): array
    {
        $pageForm = "'" . $pageForm . "'";
        $pageContent = "'" . $pageContent . "'";

        $order = "SELECT tresc FROM $table WHERE polozenie =  $pageForm and czesc_strony = $pageContent";

        $resultDatabase = mysqli_query($this->mysqlHandle, $order);

        $arrayResult = [];
        $i = 0;

        while ($result = mysqli_fetch_row($resultDatabase)) {
            $finString = null;

            for ($j = 0; $j < count($result); $j++) {
                $finString = $finString . $result[$j] . self::STRING_CONCATENATION;
            }

            $arrayResult[$i] = $finString;
            $i++;
        }

        return $arrayResult;
    }

}