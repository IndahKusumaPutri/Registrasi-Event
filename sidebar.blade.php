<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('regisevent.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'registrasievent' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Registrasi Event</p>
                            </a>
                        </li>
                    </ul>
