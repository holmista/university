<?php
use App\Enums\ComplainerTypeEnum;
$complainerName = $complaint->complainer_type === ComplainerTypeEnum::Courier->value ? $complaint->complainer->user->name : $complaint->complainer->name;
$complaineeName = $complaint->complainee_type === ComplainerTypeEnum::Courier->value ? $complaint->complainee->user->name : $complaint->complainee->name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Complaint</title>
</head>

<body style="height: 100vh">
    <div class="flex-col justify-center items-center w-screen"
        style="height: 100vh; background-color: gainsboro; padding: 20px">
        <h1 style="font-size: 2rem">Complaint #{{ $complaint->id }}</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="margin-top: 40px">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Complainer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Complainee
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $complaint->content }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $complainerName }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $complaineeName }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $complaint->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $complaint->created_at->format('Y-m-d') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
