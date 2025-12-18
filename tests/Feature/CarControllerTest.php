<?php

describe('Tests for the car controller', function() {
    test('can add a new car to the database', function() {
        $data = [
            'current_odometer' => 10000,
            'date_of_prev_oil_change' => now(),
            'odometer_at_prev_oil_change' => 9000,
        ];

        $this->post('car.store', $data);

        $this->assertDatabaseCount('cars', 1);
        $this->assertDatabaseHas('cars', $data);
    });



});
