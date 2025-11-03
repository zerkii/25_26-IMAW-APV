<?php
    function calcularHipotenusa(float $catetoA, float $catetoB): float{
        $hipotenusa = sqrt($catetoA**2 + $catetoB**2);
        return $hipotenusa;
    }
?>