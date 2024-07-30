<?php
#include file

include ('../dataAccess/conexion/Conexion.php');

#clase
class Calculator
{
    #attributes
    private int $idCalculator;
    private int $numberOneCalculator;
    private int $numberTwoCalculator;
    private int $resultCalculator;
    private string $operationCalculator;
    private $connectionDB;

    #constructor
    function __construct(ConexionDB $connectionDB)
    {
        $this->connectionDB = $connectionDB->connect();
    }

    #setters y getters
    public function setIdCalculator(int $idCalculator): void
    {
        $this->idCalculator = $idCalculator;
    }
    public function setNumberOneCalculator(int $numberOneCalculator): void
    {
        $this->numberOneCalculator = $numberOneCalculator;
    }

    public function setNumberTwoCalculator(int $numberTwoCalculator): void
    {
        $this->numberTwoCalculator = $numberTwoCalculator;
    }

    public function setResultCalculator(int $resultCalculator): void
    {
        $this->resultCalculator = $resultCalculator;
    }

    public function setOperationCalculator(string $operationCalculator): void
    {
        $this->operationCalculator = $operationCalculator;
    }
    public function getIdCalculator(): int
    {
        return $this->idCalculator;
    }
    public function getNumberOneCalculator(): int
    {
        return $this->numberOneCalculator;
    }

    public function getNumberTwoCalculator(): int
    {
        return $this->numberTwoCalculator;
    }

    public function getResultCalculator(): int
    {
        return $this->resultCalculator;
    }
    
    public function getOperationCalculator(): string
    {
        return $this->operationCalculator;
    }
    #methods

        #read Calculator
        public function readCalculator():array
        {
            try {
                $sql = "SELECT * FROM record";
                $stmt = $this->connectionDB->prepare($sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $arrayQuery = $stmt->fetchAll();
                return $arrayQuery;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return [];
    
        }

    #add Calculator
    public function addCalculator(): bool
    {
        try {
            $sql = "INSERT INTO record (numberOne,numberTwo, result,operation ) VALUES (?,?,?,?)";            
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getNumberOneCalculator(), $this->getNumberTwoCalculator(), $this->getResultCalculator(), $this->getOperationCalculator()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }

    #delete Calculator

    public function deleteCalculator():bool
    {
        try {
            $sql = "DELETE FROM tb_Calculator WHERE idCalculator=?";
            $stmt = $this->connectionDB->prepare($sql);
            $stmt->execute(array($this->getIdCalculator()));
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    private function affectedColumns($numer): bool
    {
        if ($numer <> null && $numer > 0) {
            $msm = true;
        } else {
            $msm=false;
        }
        return $msm;
    }
}
