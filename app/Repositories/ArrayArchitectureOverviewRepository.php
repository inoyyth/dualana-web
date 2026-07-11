<?php

namespace App\Repositories;

use App\Repositories\Contracts\ArchitectureOverviewRepositoryInterface;

class ArrayArchitectureOverviewRepository implements ArchitectureOverviewRepositoryInterface
{
    public function getLayers(): array
    {
        return [
            [
                'name' => 'Presentation Layer',
                'description' => 'Handles the UI and user interactions for the application.',
                'responsibilities' => [
                    'Receives requests from the browser or client.',
                    'Displays data to the user.',
                    'Routes incoming actions to the application layer.',
                ],
            ],
            [
                'name' => 'Application Layer',
                'description' => 'Coordinates use cases and orchestrates business operations.',
                'responsibilities' => [
                    'Executes a use case for each feature request.',
                    'Coordinates services and transformations.',
                    'Keeps controllers thin and focused on HTTP concerns.',
                ],
            ],
            [
                'name' => 'Business Layer',
                'description' => 'Contains the domain rules that define how the application behaves.',
                'responsibilities' => [
                    'Encapsulates business logic and rules.',
                    'Protects core domain behavior from infrastructure details.',
                    'Serves as the decision-making core of the feature.',
                ],
            ],
            [
                'name' => 'Data Layer',
                'description' => 'Provides persistence and data access for the application.',
                'responsibilities' => [
                    'Reads and writes records from storage.',
                    'Abstracts database access behind repositories.',
                    'Supports the rest of the system with structured data.',
                ],
            ],
        ];
    }
}
