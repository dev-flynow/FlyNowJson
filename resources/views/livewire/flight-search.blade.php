<div>


<div>
    <form wire:submit.prevent="search">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-2 rounded-4 sectab" style="background-color: #008080; padding: 10px 15px;">
            <!-- Tabs -->
            <ul class="nav nav-tabs flex-nowrap  gap-2 gap-md-6 mb-2 mb-md-0 border-0" style="nowrap;">
                @foreach (['oneway' => 'One Way', 'round' => 'Round Trip', 'multi' => 'Multi City'] as $value => $label)
                    <li class="nav-item">
                    <a href="#" class="nav-link fw-bold {{ $tripType === $value ? 'active custom-active text-white' : 'text-white' }}"
                    wire:click.prevent="$set('tripType', '{{ $value }}')">
                    {{ $label }}
                    </a>


                    </li>
                @endforeach
            </ul>

            <div class="d-flex flex-column justify-content-center">
            <!-- Travel Class -->
            <select wire:model="travelClass" class="form-select" style="max-width: 190px; font-weight: bold; background: transparent; color: #fff; border: 1px solid #fff;">

                    <option value="" class="text-black">Select Travel Class</option>
                    <option value="economy" class="text-black">Economy</option>
                    <option value="business" class="text-black">Business</option>
                    <option value="first-class" class="text-black">First Class</option>
                    <option value="premium-economy" class="text-black">Premium Economy</option>
                   
                </select>
                @error('travelClass') <span class="text-warning-orange">{{ $message }}</span> @enderror

            </div>
            <!-- Traveller Counts -->
            <div class="dropdown" x-data="{ open: false }" @click.outside="open = false">
                <button class="form-control d-flex align-items-center" type="button" @click="open = !open" aria-expanded="false" style="font-size: 14px; font-weight: bold; border: 1px solid #fff; background: transparent; color: white; padding: 8px;">
                    <i class="bi bi-people-fill me-2"></i> {{ __('Traveller') }}
                </button>

                <ul :class="open ? 'dropdown-menu show' : 'dropdown-menu'" style="width: 100%; max-width: 300px; padding: 10px;" x-cloak>
                    <!-- Adults -->
                    <li class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fs-6">{{ __('Adults') }}</div>
                            <div class="d-flex align-items-center">
                                <span x-on:click="$wire.set('adults', Math.max(1, $wire.adults - 1))" style="color: rgb(2, 17, 83); padding: 0.4rem; font-size: 1.2rem;">
                                    <i class="bi bi-dash-circle-fill"></i>
                                </span>
                                <input type="text" class="form-control text-center" x-model="$wire.adults" style="width: 60px; font-size: 1rem; margin: 0 0.4rem;" />
                                <span x-on:click="$wire.set('adults', Math.min(9, $wire.adults + 1))" style="color: rgb(2, 17, 83); padding: 0.4rem; font-size: 1.2rem;">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                    <!-- Children -->
                    <li class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <div class="fs-6">{{ __('Children') }}</div>
                            <div class="d-flex align-items-center">
                                <span x-on:click="$wire.set('child', Math.max(0, $wire.child - 1))" style="color: rgb(2, 17, 83); padding: 0.4rem; font-size: 1.2rem;">
                                    <i class="bi bi-dash-circle-fill"></i>
                                </span>
                                <input type="text" class="form-control text-center" x-model="$wire.child" style="width: 60px; font-size: 1rem; margin: 0 0.4rem;" />
                                <span x-on:click="$wire.set('child', Math.min(9, $wire.child + 1))" style="color: rgb(2, 17, 83); padding: 0.4rem; font-size: 1.2rem;">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                    <!-- Infants -->
                    <li class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fs-6">{{ __('Infants') }}</div>
                            <div class="d-flex align-items-center">
                                <span x-on:click="$wire.set('infants', Math.max(0, $wire.infants - 1))" style="color: rgb(2, 17, 83); padding: 0.4rem; font-size: 1.2rem;">
                                    <i class="bi bi-dash-circle-fill"></i>
                                </span>
                                <input type="text" class="form-control text-center" x-model="$wire.infants" style="width: 60px; font-size: 1rem; margin: 0 0.4rem;" />
                                <span x-on:click="$wire.set('infants', Math.min(9, $wire.infants + 1))" style="color: rgb(2, 17, 83); padding: 0.4rem; font-size: 1.2rem;">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content mt-4">
            @if($tripType === 'oneway' || $tripType === 'round')
                <div class="row g-3">
                    <div class="col-md-3 ">
                        <div class="d-flex flex-md-row align-items-center">
                            <span class="input-group-text"><i class="bi bi-airplane-engines" style="transform: rotate(45deg);"></i></span>
                            <input type="text" wire:model="origin" class="form-control" placeholder="Where From" />
                        </div>
                        @error('origin') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3 ">
                        <div class="d-flex flex-md-row align-items-center">
                            <span class="input-group-text"><i class="bi bi-airplane-engines" style="transform: rotate(135deg);"></i></span>
                            <input type="text" wire:model="destination" class="form-control" placeholder="Where To" />
                        </div>
                        @error('destination') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-3 ">
                        <div class="d-flex flex-md-row align-items-center">
                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                            <input type="text" wire:model="departureDate" class="form-control" placeholder="Select departure date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" min="{{ now()->toDateString() }}"/>
                        </div>
                        @error('departureDate') <span class="text-danger small d-block mt-1">{{ $message }}</span> @enderror
                    </div>

                    @if($tripType === 'round')
                    <div class="col-md-3">
                        <div class="d-flex flex-md-row align-items-center">
                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                            <input type="text" wire:model="returnDate" class="form-control" placeholder="Select return date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" min="{{ now()->toDateString() }}" />
                        </div>
                        @error('returnDate') 
                            <span class="text-danger small d-block mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center justify-content-center" wire:loading.attr="disabled">
                            <span>Search Flights</span>
                            <div wire:loading wire:target="search" class="spinner-border spinner-border-sm text-light ms-2" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            @elseif($tripType === 'multi')
                <!-- You can implement your dynamic multi-city form here using Livewire repeater fields or Alpine.js -->
                <div class="text-center text-muted">Multi-city support coming soon...</div>
            @endif
        </div>
    </form>
</div>


<!-- Search Results Card-->
 <div>
    <div>
    @if($hasSearched)
            @if(!empty($paginatedResults))
                <div>
                    @foreach($paginatedResults as $index => $flight)
                    <div class="card mt-4">
                        <div class="card-body border p-3 mb-3">
                            <div class="row">
                                <!-- Flight Details -->
                                
                                    <div class="card-header">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-8 d-flex align-items-centerr text-center">
                                                <img src="{{ asset($flight['logo']) }}" 
                                                    alt="{{ $flight['name'] }}" 
                                                    style="width: 50px;"
                                                    class=" me-3 text-center" />
                                                <span class="card-title me-3 text-center">{{ $flight['airline'] }}</span>
                                                <span class="vr mx-3 d-none d-md-inline"></span>
                                                <span class="fw-bold text-center">
                                                    <i class="bi bi-tags"></i> BEST OFFERS
                                                </span>
                                            </div>
                                            <div class="col-4 text-end">
                                                <button type="button" class="btn shere-btn "
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#exampleModalcardshare" >
                                                
                                                        <i class="bi bi-share-fill"></i>
                                                        <span class="ms-2"> Share </span> 
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="exampleModalcardshare" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-end" id="exampleModalLabel">Share Itinerary</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                    <label for="exampleFormControlInput1From" class="form-label text-center w-100">From:</label>
                                                    <input type="email" class="form-control" id="exampleFormControlInput1From" placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                    <label for="exampleFormControlInput1To" class="form-label text-center w-100">To:</label>
                                                    <input type="email" class="form-control" id="exampleFormControlInput1To" placeholder="Enter Email Address">
                                                    </div>
                                                </div>
                                                </div>  
                                                <div class="mb-3">
                                                <label for="editor1" class="form-label text-center w-100">Message</label>
                                                <textarea class="form-control" id="editor1" rows="3"></textarea>
                                                </div>
                                                <div class="text-end">
                                            
                                                <button type="button" class="btn shere-btn">
                                                <i class="bi bi-share-fill "></i>
                                                <span class="ms-2"> Share </span> 
                                                </button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                <div class="col-12 col-md-9 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center w-100 text-center text-md-start">
                                                <div class="col-12 col-md-4 mb-2 mb-md-0 ustify-content-between">
                                                    <p class="mb-1">
                                                        <strong>{{ $flight['origin'] }}</strong><br />
                                                        <span class="small"> {{ $flight['departureTime'] }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-12 col-md-4 text-center mb-2 mb-md-0">
                                                <div class="flight-path my-2">
                                                    <span class="plane"><img src="{{ asset('img/air.png') }}" alt="Flight Icon" style="width: 25px; height: 25px; object-fit: contain;" class="mx-2">

                                                    </span>
                                                    
                                                </div>
                                                    <p class="mb-1 small">{{ $flight['duration'] ?? 'Duration N/A' }}</p>
                                                    <p class="mb-1 small text-muted"> {{ $flight['travelClass'] }}</p>
                                                </div>
                                                <div class="col-12 col-md-4 text-md-end">
                                                    <p class="mb-1">
                                                        <strong>{{ $flight['destination'] }}</strong><br />
                                                        <span class="small"> {{ $flight['arrivalTime'] }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                    
                                </div>

                                <!-- Price & Booking -->
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
                                    
                                    <!--<h5 class="text-decoration-line-through mb-1">{{ $flight['price'] }}</h5>-->
                                    
                                    <h3 class="text-success mb-1">${{ $flight['price'] }}</h3>
                                    <small class="d-block text-center">Per Adult</small>
                                    <button class="btn btn-success px-3 py-2 mt-2" wire:click="book({{ $index }})">Book Now</button>
                                    <h6 class="text-warning text-center mt-2">
                                        HOLD FOR FREE <i class="bi bi-hand-index text-warning"></i>
                                    </h6>
                                </div>

                                    <div class="card-footer">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-4 text-center">
                                            <a href="payment.html" class="flight-details-link text-end text-decoration-none" style="font-size: 0.8rem;">
                                                <i class="bi bi-calendar-check"></i> Pay monthly LKR 1,000
                                            </a>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                            <button type="button" class="text-decoration-none text-primary" data-bs-toggle="modal" data-bs-target="#exampleModalflight" style="border: none; background-color: transparent; font-size: 0.8rem;">
                                                <i class="bi bi-info-circle-fill"></i> View flight details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    {{ $paginatedResults->links() }}
                            
                </div>
                @else
                <p>No flight details available.</p>
            @endif
        @endif    
    </div>
</div>
