<?php


// DI
// Best practice to help us write maintainable code
// Related to situations where one object uses another object to do it's job

// If some object (Barista) needs to use some other object (CoffeeMachine) to do it's job,
// we pass the dependency in from the outside we do not instantiate within the object

// In laravel, if you have a controller that needs to use a service, we pass the service in
// from the outside

// Laravel has something called autowiring, it is able to automatically pass
// dependencies into your objects for you, as long as you type hint them properly

// In Laravel there are some situations where we MUST instantiate objects within other objects
// When we are adding items to a database

// Laravel is focused on development speed, it trades some elements of best practice in exchange
// for rapid development
// For example, we just magically use models in controllers whenever we need them

class Barista {

    public CoffeeMachine $machine;

    public function __construct(CoffeeMachine $machine)
    {
        $this->machine = $machine;
    }

    public function makeLatte(): string
    {
        $this->machine->brewCoffee();
    }

    public function makeIcedLatte(): string
    {
        $this->machine->brewCoffee();
    }
}

class CoffeeMachine {
    public function brewCoffee(): string
    {
        return 'Yummy coffee';
    }
}
