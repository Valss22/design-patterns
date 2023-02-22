<?php
    
interface Transport {
    function deliver(): string;
}

abstract class TransportFactory {
    abstract function create(): Transport;

    function deliver(): string {
        $transport = $this->create();
        return $transport->deliver();
    }

}

?>