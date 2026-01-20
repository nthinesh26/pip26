 <div class="pip-dash-col">
     <!-- Maklumat Organisasi (UNCHANGED from TERHAD) -->
     <section class="pip-box" id="pipBoxOrgDetails">
         <div class="pip-box-head">
             <h3 class="pip-box-title pip-box-title--right" data-i18n="box_org_title">Maklumat Organisasi</h3>
         </div>
         <div class="pip-box-body">
             <div class="pip-orgmeta">
                 <div class="pip-orgmeta-row">
                     <div class="pip-orgmeta-label" data-i18n="org_agency_name">NAMA AGENSI</div>
                     <div class="pip-orgmeta-value">
                         <div class="pip-orgmeta-strong">{{ $profile->agensi_name }}</div>
                     </div>
                 </div>

                 <div class="pip-orgmeta-row">
                     <div class="pip-orgmeta-label" data-i18n="org_established_date">TARIKH DITUBUHKAN</div>
                     <div class="pip-orgmeta-value">{{ $profile->company_established }}</div>
                 </div>
                 <div class="pip-orgmeta-row">
                     <div class="pip-orgmeta-label" data-i18n="org_agency_type">JENIS AGENSI</div>
                     <div class="pip-orgmeta-value">{!! $profile->fetchType() !!}</div>
                 </div>

                 <hr class="pip-orgmeta-divider">
                 <!-- Contact icons (SVG) -->
                 <div class="pip-orgmeta-contact">
                     <div class="pip-orgmeta-contact-item">
                         <span aria-hidden="true" class="pip-ico pip-ico--muted">
                             <svg height="18" viewBox="0 0 24 24" width="18">
                                 <path
                                     d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5Z"
                                     fill="currentColor"></path>
                             </svg>
                         </span>
                         <span class="pip-orgmeta-contact-text"><span class="pip-orgmeta-contact-text"><span
                                     class="pip-orgmeta-contact-text">{!! $profile->fetchAddress()['general'] !!}</span>
                             </span></span>
                     </div>
                     <div class="pip-orgmeta-contact-item" style="display: none;">
                         <span aria-hidden="true" class="pip-ico pip-ico--muted">
                             <svg height="18" viewBox="0 0 24 24" width="18">
                                 <path
                                     d="M15 5 9 3 3 5v16l6-2 6 2 6-2V3l-6 2Zm-6 0v14l-4 1.33V6.33L9 5Zm6 14-4-1.33V3.67L15 5v14Zm4-1.33L17 19V5l4-1.33v14Z"
                                     fill="currentColor"></path>
                             </svg>
                         </span>
                         <span class="pip-orgmeta-contact-text"></span>
                     </div>
                     <div class="pip-orgmeta-contact-item" style="display: none;">
                         <span aria-hidden="true" class="pip-ico pip-ico--muted">
                             <svg height="18" viewBox="0 0 24 24" width="18">
                                 <path
                                     d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2Zm6.93 9H15.7a15.9 15.9 0 0 0-1.08-6.02A8.02 8.02 0 0 1 18.93 11ZM12 4c.9 1.29 1.63 3.72 1.86 7H10.14C10.37 7.72 11.1 5.29 12 4ZM5.07 13h3.23c.18 2.18.63 4.12 1.31 5.55A8.02 8.02 0 0 1 5.07 13Zm3.23-2H5.07a8.02 8.02 0 0 1 4.54-6.02A15.9 15.9 0 0 0 8.3 11ZM12 20c-.9-1.29-1.63-3.72-1.86-7h3.72c-.23 3.28-.96 5.71-1.86 7Zm2.39-1.45c.68-1.43 1.13-3.37 1.31-5.55h3.23a8.02 8.02 0 0 1-4.54 5.55ZM15.7 13c.12-1.02.2-2.08.22-3H19a8.15 8.15 0 0 1 0 6h-3.3ZM8.3 13H5a8.15 8.15 0 0 1 0-6h3.52c.02.92.1 1.98.22 3Z"
                                     fill="currentColor"></path>
                             </svg>
                         </span>
                         <span class="pip-orgmeta-contact-text"></span>
                     </div>
                     <div class="pip-orgmeta-contact-item">
                         <span aria-hidden="true" class="pip-ico pip-ico--muted">
                             <svg height="18" viewBox="0 0 24 24" width="18">
                                 <path
                                     d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-4.42 0-8 2.24-8 5v1h16v-1c0-2.76-3.58-5-8-5Z"
                                     fill="currentColor"></path>
                             </svg>
                         </span>
                         <span class="pip-orgmeta-contact-text">{{ $profile->agency_phone }}</span>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>
