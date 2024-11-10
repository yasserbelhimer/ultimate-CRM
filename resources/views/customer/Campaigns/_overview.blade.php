<div class="row match-height">
    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $campaign->readCache('ContactCount') }}</h2>
                    <p class="card-text">{{ __('locale.campaigns.total_recipients') }}</p>
                </div>

                <div class="avatar bg-light-info p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="check-square" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->delivered_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.delivered') }}</p>
                </div>

                <div class="avatar bg-light-success p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="check-square" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->enroute_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.enroute') }}</p>
                </div>

                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="truck" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row match-height">

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->undelivered_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.undelivered') }}</p>
                </div>

                <div class="avatar bg-light-danger p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="x-square" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->rejected_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.rejected') }}</p>
                </div>

                <div class="avatar bg-light-danger p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="x-circle" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->accepted_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.accepted') }}</p>
                </div>

                <div class="avatar bg-light-primary p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="check-circle" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row match-height">

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->expired_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.expired') }}</p>
                </div>

                <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="alert-triangle" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->skipped_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.skipped') }}</p>
                </div>

                <div class="avatar bg-light-warning p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="skip-forward" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-sm-6 col-12">
        <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="fw-bolder mb-0">{{ $reportStatusCounts->failed_count }}</h2>
                    <p class="card-text">{{ __('locale.labels.failed') }}</p>
                </div>

                <div class="avatar bg-light-danger p-50 m-0">
                    <div class="avatar-content">
                        <i data-feather="x-octagon" class="font-medium-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="row match-height">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4 class="mb-0 text-uppercase text-primary">{{__('locale.menu.Overview')}}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <h5 class="mb-1">{{ __('locale.labels.campaign_name') }}: <span
                                class="fw-bold"> {{ $campaign->campaign_name }}</span></h5>
                    <h5 class="mb-1">{{ __('locale.labels.campaign_id') }}: <span
                                class="fw-bold"> {{ $campaign->uid }}</span></h5>
                    <h5 class="mb-1">{{ __('locale.labels.campaigns_type') }}: <span
                                class="fw-bold"> {!! $campaign->getCampaignType() !!}</span></h5>
                    <h5 class="mb-1">{{ __('locale.labels.status') }}: <span
                                class="fw-bold text-capitalize"> {{ $campaign->status }}</span></h5>
                    <h5 class="mb-1">{{ __('locale.labels.created_at') }}: <span
                                class="fw-bold"> {{ \App\Library\Tool::customerDateTime($campaign->created_at) }}</span>
                    </h5>
                    <h5 class="mb-1">{{ __('locale.labels.run_at') }}: <span
                                class="fw-bold"> {{ \App\Library\Tool::customerDateTime($campaign->run_at) }}</span>
                    </h5>

                    @if($campaign->upload_type == 'normal')
                        <h5 class="mb-1">{{ __('locale.contacts.contact_groups') }}: <span
                                    class="fw-bold"> {!! $campaign->contactGroupsName() !!}</span></h5>
                    @endif



                    @if($campaign->status == \App\Models\Campaigns::STATUS_FAILED || $campaign->status == \App\Models\Campaigns::STATUS_CANCELLED || $campaign->status == \App\Models\Campaigns::STATUS_PAUSED)
                        <h5 class="mb-1">{{ __('locale.labels.reason') }}: <code> {{ $campaign->reason }}</code></h5>
                    @endif

                    @if($campaign->status == \App\Models\Campaigns::STATUS_ERROR)
                        <h5 class="mb-1">{{ __('locale.labels.reason') }}: <code> {{ $campaign->last_error }}</code>
                        </h5>
                    @endif

                    @if($campaign->status == \App\Models\Campaigns::STATUS_DELIVERED || $campaign->status == \App\Models\Campaigns::STATUS_DONE)
                        <h5 class="mb-1">{{ __('locale.labels.delivered_at') }}: <span
                                    class="fw-bold"> {{ \App\Library\Tool::customerDateTime($campaign->delivery_at) }}</span>
                        </h5>
                    @endif


                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4 class="card-title">{{ __('locale.labels.success_rate') }}</h4>
            </div>

            <div class="card-body p-0">
                <div id="goal-overview-chart" class="my-2"></div>

                <div class="row border-top text-center mx-0">
                    <div class="col-6 border-end py-1">
                        <p class="card-text text-muted mb-0">{{ __('locale.labels.success') }}</p>
                        <h3 class="fw-bolder mb-0">{{ $campaign->readCache('DeliveredCount') }}</h3>
                    </div>
                    <div class="col-6 py-1">
                        <p class="card-text text-muted mb-0">{{ __('locale.labels.failed') }}</p>
                        <h3 class="fw-bolder mb-0">{{ $campaign->readCache('ContactCount') - $campaign->readCache('DeliveredCount') }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h4 class="card-title text-uppercase">{{ __('locale.labels.sms_reports') }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body p-0">
                    <div id="sms-reports" class="my-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

