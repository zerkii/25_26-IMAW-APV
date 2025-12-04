<?php
class Cubo {
    private bool $resuelto;
    private float $tamanio;

    public function __construct(float $tamanio) {
        $this->resuelto = true;
        $this->tamanio = $tamanio;
    }

    public function getResuelto(): bool {
        return $this->resuelto;
    }

    public function revolver(): void {
        $this->resuelto = false;
        echo "Ahora está todo revuelto";
    }
}