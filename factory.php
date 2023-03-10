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

class PlaneFactory extends TransportFactory {
    function create(): Transport {
        return new Plane();
    }
}

class Plane implements Transport {
    function deliver(): string {
        return "delivered by plane";
    }
}

class TruckFactory extends TransportFactory {
    function create(): Transport {
        return new Truck();
    }
}

class Truck implements Transport {
    function deliver(): string {
        return "delivered by truck";
    }
}

function service(TransportFactory $transport) {
    $result = $transport->deliver();
    return $result;
}

echo service(new PlaneFactory());
echo service(new TruckFactory());

?>