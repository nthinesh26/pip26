<style>
    .pip-wishlist-card {
        display: block;
        margin-top: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #848484 !important;
    }
</style>
<div class="pip-box1 pip-box--wishlist1" id="pipBoxWishlist1">
    <div class='card' style="border-radius: 10px">
        <div class='card-body'>
            <div class="pip-box-head1">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="pip-box-title" data-i18n="box_wishlist_title">Cadangan Wishlist</h3>
                    </div>
                </div>
            </div>
            @if ($profile->wishlists->where('type', $profile->user->type)->count() <= 0)
                <div class="mt-3"><span data-i18n="wishlist_empty">{{ 'Tiada cadangan buat masa ini.' }}</span
                        data-i18n="wishlist_empty"></div>
            @endif

            @foreach ($profile->wishlists->where('type', $profile->user->type) as $wh)
                <div class="pip-box-body1">
                    <div class="pip-wishlist-card" data-show="" style="background-color: #fff !important">
                        <!-- Top meta -->

                        <div class="pip-wc-top" style="background-color: #fff !important">
                            <div class="pip-wc-field">
                                <br /><br />
                                <div class="pip-wc-label" data-i18n="wishlist_company">NAMA SYARIKAT</div>
                                @php
                                    $col = $profile->user->companyName();
                                @endphp
                                <div class="pip-wc-value">{{ $profile->$col }}</div>
                            </div>
                            <div class="pip-wc-field pip-wc-field--right">
                                <a href="/pip/profile/view-wishlist/{{ WebTool::enc($wh->id) }}" target="_blank"
                                    class="mb-2"><input type='button' class='btn btn-default btn-sm'
                                        style="border: 1px solid #003A8F" name='view-wish-list' id='view-wish-list'
                                        value='LIHAT CADANGAN' /></a> <br /><br />
                                <div class="pip-wc-label">NOMBOR CADANGAN</div>
                                <div class="pip-wc-value">{{ $wh->wishListID() }}</div>
                            </div>
                        </div>
                        <!-- Pills + tempoh -->
                        <div class="pip-wc-meta">
                            <div class="pip-wc-field">
                                <div class="pip-wc-label" data-i18n="wishlist_category">KATEGORI</div>
                                <span class="pip-pill pip-pill--kategori">{{ $wh->category }}</span>
                            </div>
                            <div class="pip-wc-field">
                                <div class="pip-wc-label" data-i18n="wishlist_sector">SEKTOR</div>
                                <span class="pip-pill pip-pill--sektor">{{ $wh->sector }}</span>
                            </div>
                            <div class="pip-wc-field">
                                <div class="pip-wc-label" data-i18n="wishlist_priority">BIDANG KEUTAMAAN</div>
                                <span class="pip-pill pip-pill--bidang">{{ $wh->technology }}</span>
                            </div>
                            <div class="pip-wc-field pip-wc-field--tempoh">
                                <div class="pip-wc-label" data-i18n="wishlist_duration">TEMPOH PROJEK</div>
                                <div class="pip-wc-value">{{ $wh->duration }}</div>
                            </div>
                        </div>

                        <h4 class="pip-wc-subtitle" data-i18n="wishlist_desc_title">Penerangan Terperinci Projek</h4>
                        <div class="pip-wc-desc pb-3">
                            {!! $wh->description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
