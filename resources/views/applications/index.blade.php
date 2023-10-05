<x-app-layout>
    <h1 style="text-align: center;font-size: 40px;padding: 10px;">ALL APPLICATIONS</h1>
    @foreach ($applications as $application)
    <div  class="card" style="width: 18rem;margin: 5%;">
        <div class="card-body">
            <h4 class="card-title"><span style="font-weight: bold;font-size: 18px;">ID:</span> {{$application->id}}</h4>
            <h5 class="card-title"><span style="font-weight: bold;font-size: 18px;">Full Name:</span> {{$application->fullName}}</h5>
            <h6 class="card-subtitle mb-2 text-muted"><span style="font-weight: bold;font-size: 18px;">Number of Days:</span> {{$application->nights}}</h6>
            <p class="card-text"><span style="font-weight: bold;font-size: 18px;">Number of people:</span> {{$application->people}}</p>
            <p class="card-text"><span style="font-weight: bold;font-size: 18px;">Some thins you need to know:</span> {{$application->ask}}</p>

        </div>
    </div>
    @endforeach


</x-app-layout>

