<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo ">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
           
                <img src="/assets/img/zoilologo.png" alt="">
           
           

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-icon tf-icons ti ti-toggle-left"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">

        <!-- Dashboards -->

        <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>



        <li class="menu-item {{ request()->routeIs(['users.index', 'users.create']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <!-- User List -->
                <li class="menu-item {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>

                <!-- Create User -->
                <li class="menu-item {{ Route::currentRouteName() == 'users.create' ? 'active' : '' }}">
                    <a href="{{ route('users.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item  {{ request()->routeIs(['role.index', 'permission.index']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-settings'></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'role.index' ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'permission.index' ? 'active' : '' }}">
                    <a href="{{ route('permission.index') }}" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item {{ request()->routeIs(['category.index', 'category.create']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                <div data-i18n="Category">Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">
                    <a href="{{ route('category.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item  {{ Route::currentRouteName() == 'category.create' ? 'active' : '' }}">
                    <a href="{{ route('category.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>

            </ul>
        </li>

        <li
            class="menu-item {{ request()->routeIs(['subcategory.index', 'subcategory.create']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-table"></i>
                <div data-i18n="Subcategory">Subcategory</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'subcategory.index' ? 'active' : '' }}">
                    <a href="{{ route('subcategory.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'subcategory.create' ? 'active' : '' }}">
                    <a href="{{ route('subcategory.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
            </ul>
        </li>






        <!-- Layouts -->



        <!-- e-commerce-app menu start -->



        <li
            class="menu-item {{ request()->routeIs(['country.index', 'country.create', 'country.edit', 'state.index', 'state.create', 'state.edit', 'city.index', 'city.create', 'city.edit']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-map-pin'></i>
                <div data-i18n="Geographic Management">Geographic Management</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ request()->routeIs(['country.index', 'country.create', 'country.edit']) ? 'active' : '' }}">
                    <a href="{{ route('country.index') }}" class="menu-link">
                        <div data-i18n="Countries">Countries</div>
                    </a>
                </li>

                <li
                    class="menu-item {{ request()->routeIs(['state.index', 'state.create', 'state.edit']) ? 'active' : '' }}">
                    <a href="{{ route('state.index') }}" class="menu-link">
                        <div data-i18n="States">States</div>
                    </a>
                </li>

                <li
                    class="menu-item {{ request()->routeIs(['city.index', 'city.create', 'city.edit']) ? 'active' : '' }}">
                    <a href="{{ route('city.index') }}" class="menu-link">
                        <div data-i18n="Cities">Cities</div>
                    </a>
                </li>

            </ul>
        </li>


        <!-- Branch menu start -->
        <li class="menu-item  {{ request()->routeIs(['brand.index', 'brand.create']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-tag'></i>
                <div data-i18n="Brands">Brands</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'brand.index' ? 'active' : '' }}">
                    <a href="{{ route('brand.index') }}" class="menu-link">
                        <div data-i18n="List">List</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'brand.create' ? 'active' : '' }}">
                    <a href="{{ route('brand.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Academy menu end -->


        <li
            class="menu-item {{ request()->routeIs(['inquery-question.index', 'inquiry.index', 'inquery-question.create', 'inquery-question.edit', 'inquiry.create', 'inquiry.edit','inquiry-answer.index', 'inquiry-answer.create', 'inquiry-answer.edit']) ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i
                    class='menu-icon tf-icons ti ti-help {{ request()->routeIs(['inquery-question.*', 'inquiry.*']) ? 'active' : '' }}'></i>
                <div data-i18n="Inquiry">Inquiry</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ request()->routeIs(['inquiry.index', 'inquiry.create', 'inquiry.edit']) ? 'active' : '' }}">
                    <a href="{{ route('inquiry.index') }}" class="menu-link">
                        <div data-i18n="Inquiry">Inquiry</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ request()->routeIs(['inquery-question.index', 'inquery-question.create', 'inquery-question.edit']) ? 'active' : '' }}">
                    <a href="{{ route('inquery-question.index') }}" class="menu-link">
                        <div data-i18n="Inquiry Question">Inquiry Question</div>
                    </a>
                </li>

              

            </ul>
        </li>



        <li class="menu-item  {{ request()->routeIs(['product.index', 'product.create', 'product.edit','product-question.index','product-question.create','product-question.edit']) ? 'active open' : '' }}">
          <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-package"></i> 

            <div data-i18n="Products">Products</div>
          </a>
          <ul class="menu-sub">
            <li class="menu-item  {{ request()->routeIs(['product.index', 'product.create', 'product.edit']) ? 'active' : '' }}">
              <a href="{{ route('product.index') }}" class="menu-link">
                <div data-i18n="Products">Products</div>
              </a>
            </li>
            <li class="menu-item   {{ request()->routeIs(['product-question.index', 'product-question.create', 'product-question.edit']) ? 'active' : '' }}">
              <a href="{{ route('product-question.index') }}" class="menu-link">
                <div data-i18n="Product Question">Product Question</div>
              </a>
            </li>
            
          </ul>
        </li>




        <!-- e-commerce-app menu end -->

        <!-- Apps & Pages -->


        {{-- <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Apps & Pages">Apps &amp; Pages</span>
      </li>
      <li class="menu-item">
        <a href="app-email.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-mail"></i>
          <div data-i18n="Email">Email</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="app-chat.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-messages"></i>
          <div data-i18n="Chat">Chat</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="app-calendar.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-calendar"></i>
          <div data-i18n="Calendar">Calendar</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="app-kanban.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
          <div data-i18n="Kanban">Kanban</div>
        </a>
      </li> --}}








        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class='menu-icon tf-icons ti ti-truck'></i>
          <div data-i18n="Logistics">Logistics</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="app-logistics-dashboard.html" class="menu-link">
              <div data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="app-logistics-fleet.html" class="menu-link">
              <div data-i18n="Fleet">Fleet</div>
            </a>
          </li>
        </ul>
      </li> --}}





        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-file"></i>
          <div data-i18n="Pages">Pages</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="User Profile">User Profile</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="pages-profile-user.html" class="menu-link">
                  <div data-i18n="Profile">Profile</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-profile-teams.html" class="menu-link">
                  <div data-i18n="Teams">Teams</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-profile-projects.html" class="menu-link">
                  <div data-i18n="Projects">Projects</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-profile-connections.html" class="menu-link">
                  <div data-i18n="Connections">Connections</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                  <div data-i18n="Account">Account</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-account-settings-security.html" class="menu-link">
                  <div data-i18n="Security">Security</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-account-settings-billing.html" class="menu-link">
                  <div data-i18n="Billing & Plans">Billing & Plans</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-account-settings-notifications.html" class="menu-link">
                  <div data-i18n="Notifications">Notifications</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-account-settings-connections.html" class="menu-link">
                  <div data-i18n="Connections">Connections</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="pages-faq.html" class="menu-link">
              <div data-i18n="FAQ">FAQ</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-pricing.html" class="menu-link">
              <div data-i18n="Pricing">Pricing</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Misc">Misc</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="pages-misc-error.html" class="menu-link" target="_blank">
                  <div data-i18n="Error">Error</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-misc-under-maintenance.html" class="menu-link" target="_blank">
                  <div data-i18n="Under Maintenance">Under Maintenance</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-misc-comingsoon.html" class="menu-link" target="_blank">
                  <div data-i18n="Coming Soon">Coming Soon</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-misc-not-authorized.html" class="menu-link" target="_blank">
                  <div data-i18n="Not Authorized">Not Authorized</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-lock"></i>
          <div data-i18n="Authentications">Authentications</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Login">Login</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-login-cover.html" class="menu-link" target="_blank">
                  <div data-i18n="Cover">Cover</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Register">Register</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-register-cover.html" class="menu-link" target="_blank">
                  <div data-i18n="Cover">Cover</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-register-multisteps.html" class="menu-link" target="_blank">
                  <div data-i18n="Multi-steps">Multi-steps</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Verify Email">Verify Email</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-verify-email-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-verify-email-cover.html" class="menu-link" target="_blank">
                  <div data-i18n="Cover">Cover</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Reset Password">Reset Password</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-reset-password-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-reset-password-cover.html" class="menu-link" target="_blank">
                  <div data-i18n="Cover">Cover</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Forgot Password">Forgot Password</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-forgot-password-cover.html" class="menu-link" target="_blank">
                  <div data-i18n="Cover">Cover</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Two Steps">Two Steps</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-two-steps-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-two-steps-cover.html" class="menu-link" target="_blank">
                  <div data-i18n="Cover">Cover</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li> --}}
    

      {{-- <li class="menu-item">
        <a href="modal-examples.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-square"></i>
          <div data-i18n="Modal Examples">Modal Examples</div>
        </a>
      </li> --}}

        <!-- Components -->
        {{-- <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Components">Components</span>
      </li> --}}
        <!-- Cards -->
        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-id"></i>
          <div data-i18n="Cards">Cards</div>
          <div class="badge bg-primary rounded-pill ms-auto">5</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
              <div data-i18n="Basic">Basic</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-advance.html" class="menu-link">
              <div data-i18n="Advance">Advance</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-statistics.html" class="menu-link">
              <div data-i18n="Statistics">Statistics</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-analytics.html" class="menu-link">
              <div data-i18n="Analytics">Analytics</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="cards-actions.html" class="menu-link">
              <div data-i18n="Actions">Actions</div>
            </a>
          </li>
        </ul>
      </li> --}}
        <!-- User interface -->
        {{-- <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-color-swatch"></i>
          <div data-i18n="User interface">User interface</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="ui-accordion.html" class="menu-link">
              <div data-i18n="Accordion">Accordion</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-alerts.html" class="menu-link">
              <div data-i18n="Alerts">Alerts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-badges.html" class="menu-link">
              <div data-i18n="Badges">Badges</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-buttons.html" class="menu-link">
              <div data-i18n="Buttons">Buttons</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-carousel.html" class="menu-link">
              <div data-i18n="Carousel">Carousel</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-collapse.html" class="menu-link">
              <div data-i18n="Collapse">Collapse</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-dropdowns.html" class="menu-link">
              <div data-i18n="Dropdowns">Dropdowns</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-footer.html" class="menu-link">
              <div data-i18n="Footer">Footer</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-list-groups.html" class="menu-link">
              <div data-i18n="List Groups">List groups</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-modals.html" class="menu-link">
              <div data-i18n="Modals">Modals</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-navbar.html" class="menu-link">
              <div data-i18n="Navbar">Navbar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-offcanvas.html" class="menu-link">
              <div data-i18n="Offcanvas">Offcanvas</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-pagination-breadcrumbs.html" class="menu-link">
              <div data-i18n="Pagination & Breadcrumbs">Pagination &amp; Breadcrumbs</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-progress.html" class="menu-link">
              <div data-i18n="Progress">Progress</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-spinners.html" class="menu-link">
              <div data-i18n="Spinners">Spinners</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-tabs-pills.html" class="menu-link">
              <div data-i18n="Tabs & Pills">Tabs &amp; Pills</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-toasts.html" class="menu-link">
              <div data-i18n="Toasts">Toasts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-tooltips-popovers.html" class="menu-link">
              <div data-i18n="Tooltips & Popovers">Tooltips &amp; Popovers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-typography.html" class="menu-link">
              <div data-i18n="Typography">Typography</div>
            </a>
          </li>
        </ul>
      </li> --}}

        <!-- Extended components -->
        {{-- <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-components"></i>
          <div data-i18n="Extended UI">Extended UI</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="extended-ui-avatar.html" class="menu-link">
              <div data-i18n="Avatar">Avatar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-blockui.html" class="menu-link">
              <div data-i18n="BlockUI">BlockUI</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-drag-and-drop.html" class="menu-link">
              <div data-i18n="Drag & Drop">Drag &amp; Drop</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-media-player.html" class="menu-link">
              <div data-i18n="Media Player">Media Player</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
              <div data-i18n="Perfect Scrollbar">Perfect Scrollbar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-star-ratings.html" class="menu-link">
              <div data-i18n="Star Ratings">Star Ratings</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-sweetalert2.html" class="menu-link">
              <div data-i18n="SweetAlert2">SweetAlert2</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-text-divider.html" class="menu-link">
              <div data-i18n="Text Divider">Text Divider</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div data-i18n="Timeline">Timeline</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="extended-ui-timeline-basic.html" class="menu-link">
                  <div data-i18n="Basic">Basic</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="extended-ui-timeline-fullscreen.html" class="menu-link">
                  <div data-i18n="Fullscreen">Fullscreen</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="extended-ui-tour.html" class="menu-link">
              <div data-i18n="Tour">Tour</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-treeview.html" class="menu-link">
              <div data-i18n="Treeview">Treeview</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-misc.html" class="menu-link">
              <div data-i18n="Miscellaneous">Miscellaneous</div>
            </a>
          </li>
        </ul>
      </li> --}}

        <!-- Icons -->
        {{-- <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-brand-tabler"></i>
          <div data-i18n="Icons">Icons</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="icons-tabler.html" class="menu-link">
              <div data-i18n="Tabler">Tabler</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="icons-font-awesome.html" class="menu-link">
              <div data-i18n="Fontawesome">Fontawesome</div>
            </a>
          </li>
        </ul>
      </li> --}}

        <!-- Forms & Tables -->
        {{-- <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Forms & Tables">Forms &amp; Tables</span>
      </li> --}}
        <!-- Forms -->
        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-toggle-left"></i>
          <div data-i18n="Form Elements">Form Elements</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="forms-basic-inputs.html" class="menu-link">
              <div data-i18n="Basic Inputs">Basic Inputs</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-input-groups.html" class="menu-link">
              <div data-i18n="Input groups">Input groups</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-custom-options.html" class="menu-link">
              <div data-i18n="Custom Options">Custom Options</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-editors.html" class="menu-link">
              <div data-i18n="Editors">Editors</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-file-upload.html" class="menu-link">
              <div data-i18n="File Upload">File Upload</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-pickers.html" class="menu-link">
              <div data-i18n="Pickers">Pickers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-selects.html" class="menu-link">
              <div data-i18n="Select & Tags">Select &amp; Tags</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-sliders.html" class="menu-link">
              <div data-i18n="Sliders">Sliders</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-switches.html" class="menu-link">
              <div data-i18n="Switches">Switches</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-extras.html" class="menu-link">
              <div data-i18n="Extras">Extras</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-layout-navbar"></i>
          <div data-i18n="Form Layouts">Form Layouts</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="form-layouts-vertical.html" class="menu-link">
              <div data-i18n="Vertical Form">Vertical Form</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="form-layouts-horizontal.html" class="menu-link">
              <div data-i18n="Horizontal Form">Horizontal Form</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="form-layouts-sticky.html" class="menu-link">
              <div data-i18n="Sticky Actions">Sticky Actions</div>
            </a>
          </li>
        </ul>
      </li> --}}
        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
          <div data-i18n="Form Wizard">Form Wizard</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="form-wizard-numbered.html" class="menu-link">
              <div data-i18n="Numbered">Numbered</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="form-wizard-icons.html" class="menu-link">
              <div data-i18n="Icons">Icons</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="form-validation.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-checkbox"></i>
          <div data-i18n="Form Validation">Form Validation</div>
        </a>
      </li> --}}
        <!-- Tables -->
        {{-- <li class="menu-item">
        <a href="tables-basic.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-table"></i>
          <div data-i18n="Tables">Tables</div>
        </a>
      </li> --}}


        <!-- Charts & Maps -->
        {{-- <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Charts & Maps">Charts &amp; Maps</span>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-chart-pie"></i>
          <div data-i18n="Charts">Charts</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="charts-apex.html" class="menu-link">
              <div data-i18n="Apex Charts">Apex Charts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="charts-chartjs.html" class="menu-link">
              <div data-i18n="ChartJS">ChartJS</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="maps-leaflet.html" class="menu-link">
          <i class="menu-icon tf-icons ti ti-map"></i>
          <div data-i18n="Leaflet Maps">Leaflet Maps</div>
        </a>
      </li> --}}

        <!-- Misc -->
        {{-- <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Misc">Misc</span>
      </li>
      <li class="menu-item">
        <a href="https://pixinvent.ticksy.com/" target="_blank" class="menu-link">
          <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
          <div data-i18n="Support">Support</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="menu-link">
          <i class="menu-icon tf-icons ti ti-file-description"></i>
          <div data-i18n="Documentation">Documentation</div>
        </a>
      </li> --}}
    </ul>



</aside>
<!-- / Menu -->
<!-- Layout container -->
<div class="layout-page">





    <!-- Navbar -->

    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">











        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-md"></i>
            </a>
        </div>


        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper mb-0">
                    <a class="nav-item nav-link search-toggler d-flex align-items-center px-0"
                        href="javascript:void(0);">
                        <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                        <span class="d-none d-md-inline-block text-muted fw-normal">Search (Ctrl+/)</span>
                    </a>
                </div>
            </div>
            <!-- /Search -->





            <ul class="navbar-nav flex-row align-items-center ms-auto">


                <!-- Language -->
                <li class="nav-item dropdown-language dropdown">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class='ti ti-language rounded-circle ti-md'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="en"
                                data-text-direction="ltr">
                                <span>English</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="fr"
                                data-text-direction="ltr">
                                <span>French</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="ar"
                                data-text-direction="rtl">
                                <span>Arabic</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="de"
                                data-text-direction="ltr">
                                <span>German</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Language -->

                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class='ti ti-md'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                <span class="align-middle"><i class='ti ti-sun ti-md me-3'></i>Light</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                <span class="align-middle"><i class="ti ti-moon-stars ti-md me-3"></i>Dark</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                <span class="align-middle"><i
                                        class="ti ti-device-desktop-analytics ti-md me-3"></i>System</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- / Style Switcher-->

                <!-- Quick links  -->
                <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill btn-icon dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <i class='ti ti-layout-grid-add ti-md'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0">
                        <div class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h6 class="mb-0 me-auto">Shortcuts</h6>
                                <a href="javascript:void(0)"
                                    class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i
                                        class="ti ti-plus text-heading"></i></a>
                            </div>
                        </div>
                        <div class="dropdown-shortcuts-list scrollable-container">
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-calendar ti-26px text-heading"></i>
                                    </span>
                                    <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                    <small>Appointments</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-file-dollar ti-26px text-heading"></i>
                                    </span>
                                    <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                    <small>Manage Accounts</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-user ti-26px text-heading"></i>
                                    </span>
                                    <a href="app-user-list.html" class="stretched-link">User App</a>
                                    <small>Manage Users</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-users ti-26px text-heading"></i>
                                    </span>
                                    <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                    <small>Permission</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-device-desktop-analytics ti-26px text-heading"></i>
                                    </span>
                                    <a href="index.html" class="stretched-link">Dashboard</a>
                                    <small>User Dashboard</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-settings ti-26px text-heading"></i>
                                    </span>
                                    <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                    <small>Account Settings</small>
                                </div>
                            </div>
                            <div class="row row-bordered overflow-visible g-0">
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-help ti-26px text-heading"></i>
                                    </span>
                                    <a href="pages-faq.html" class="stretched-link">FAQs</a>
                                    <small>FAQs & Articles</small>
                                </div>
                                <div class="dropdown-shortcuts-item col">
                                    <span class="dropdown-shortcuts-icon rounded-circle mb-3">
                                        <i class="ti ti-square ti-26px text-heading"></i>
                                    </span>
                                    <a href="modal-examples.html" class="stretched-link">Modals</a>
                                    <small>Useful Popups</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Quick links -->

                <!-- Notification -->
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <span class="position-relative">
                            <i class="ti ti-bell ti-md"></i>
                            <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-0">
                        <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h6 class="mb-0 me-auto">Notification</h6>
                                <div class="d-flex align-items-center h6 mb-0">
                                    <span class="badge bg-label-primary me-2">8 New</span>
                                    <a href="javascript:void(0)"
                                        class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                            class="ti ti-mail-opened text-heading"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="../../assets/img/avatars/1.png" alt class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="small mb-1">Congratulation Lettie 🎉</h6>
                                            <small class="mb-1 d-block text-body">Won the monthly best seller gold
                                                badge</small>
                                            <small class="text-muted">1h ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">Charles Franklin</h6>
                                            <small class="mb-1 d-block text-body">Accepted your connection</small>
                                            <small class="text-muted">12hr ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="../../assets/img/avatars/2.png" alt class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">New Message ✉️</h6>
                                            <small class="mb-1 d-block text-body">You have new message from
                                                Natalie</small>
                                            <small class="text-muted">1h ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-success"><i
                                                        class="ti ti-shopping-cart"></i></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">Whoo! You have new order 🛒 </h6>
                                            <small class="mb-1 d-block text-body">ACME Inc. made new order
                                                $1,154</small>
                                            <small class="text-muted">1 day ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="../../assets/img/avatars/9.png" alt class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">Application has been approved 🚀 </h6>
                                            <small class="mb-1 d-block text-body">Your ABC project application has been
                                                approved.</small>
                                            <small class="text-muted">2 days ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-success"><i
                                                        class="ti ti-chart-pie"></i></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">Monthly report is generated</h6>
                                            <small class="mb-1 d-block text-body">July monthly financial report is
                                                generated </small>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="../../assets/img/avatars/5.png" alt class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">Send connection request</h6>
                                            <small class="mb-1 d-block text-body">Peter sent you connection
                                                request</small>
                                            <small class="text-muted">4 days ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <img src="../../assets/img/avatars/6.png" alt class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">New message from Jane</h6>
                                            <small class="mb-1 d-block text-body">Your have new message from
                                                Jane</small>
                                            <small class="text-muted">5 days ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-label-warning"><i
                                                        class="ti ti-alert-triangle"></i></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 small">CPU is running high</h6>
                                            <small class="mb-1 d-block text-body">CPU Utilization Percent is currently
                                                at 88.63%,</small>
                                            <small class="text-muted">5 days ago</small>
                                        </div>
                                        <div class="flex-shrink-0 dropdown-notifications-actions">
                                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span
                                                    class="badge badge-dot"></span></a>
                                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span
                                                    class="ti ti-x"></span></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="border-top">
                            <div class="d-grid p-4">
                                <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                    <small class="align-middle">View all notifications</small>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/' . (Auth::user()->profile_picture ?? 'default.png')) }}" alt
                                class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item mt-0" href="pages-account-settings-account.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="avatar avatar-online">
                                            <!-- Display user's profile image -->
                                            <img src="{{ asset('assets/' . (Auth::user()->profile_picture ?? 'default.png')) }}"
                                                alt="Profile Picture" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted">{{ Auth::user()->role->name }}</small>
                                        <!-- Assuming you have a relationship defined for the role -->
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider my-1 mx-n2"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages-profile-user.html">
                                <i class="ti ti-user me-3 ti-md"></i><span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                <i class="ti ti-settings me-3 ti-md"></i><span class="align-middle">Settings</span>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider my-1 mx-n2"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages-pricing.html">
                                <i class="ti ti-currency-dollar me-3 ti-md"></i><span
                                    class="align-middle">Pricing</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages-faq.html">
                                <i class="ti ti-question-mark me-3 ti-md"></i><span class="align-middle">FAQ</span>
                            </a>
                        </li>
                        <li>

                            <div class="d-grid px-2 pt-2 pb-1">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <a class="btn btn-sm btn-danger d-flex" href="#" target="_blank"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <small class="align-middle">Logout</small>
                                    <i class="ti ti-logout ms-2 ti-14px"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/ User -->



            </ul>
        </div>


        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper  d-none">
            <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
                aria-label="Search...">
            <i class="ti ti-x search-toggler cursor-pointer"></i>
        </div>



    </nav>

    <!-- / Navbar -->
