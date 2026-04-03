<script setup>
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const givingUrl = 'https://newlifebible.churchcenter.com/giving/to/general';
</script>

<template>
    <footer class="border-t border-neutral-tan/60 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-14 md:px-6 lg:px-8">
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-5">
                <div>
                    <img
                        src="/images/logos/NLBC_LogoStacked_color.png"
                        alt="New Life Bible Church"
                        class="mb-6 h-28 w-auto"
                    />
                    <p class="text-sm leading-relaxed text-slate-700">
                        1950 N Hills Rd<br />
                        York, PA 17406
                    </p>
                    <p class="mt-3 text-sm text-slate-700">
                        Sundays 9:30am–10:45am
                    </p>
                    <p class="mt-3 text-sm">
                        <a href="tel:+17172528000" class="text-primary hover:underline">(717) 252-8000</a>
                    </p>
                    <p class="mt-1 text-sm">
                        <a href="mailto:contact@newlifebiblechurch.net" class="text-primary hover:underline">
                            contact@newlifebiblechurch.net
                        </a>
                    </p>
                </div>
                <div>
                    <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">Explore</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <Link :href="route('start-here')" class="text-slate-700 hover:text-accent">Start Here</Link>
                        </li>
                        <li>
                            <Link :href="route('who-we-are')" class="text-slate-700 hover:text-accent">Who We Are</Link>
                        </li>
                        <li>
                            <Link :href="route('ministries')" class="text-slate-700 hover:text-accent">Ministries</Link>
                        </li>
                        <li>
                            <Link :href="route('media')" class="text-slate-700 hover:text-accent">Media</Link>
                        </li>
                        <li>
                            <Link :href="route('connect')" class="text-slate-700 hover:text-accent">Connect</Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">Ministries</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <Link :href="route('ministries.kids')" class="text-slate-700 hover:text-accent">Kids Ministry</Link>
                        </li>
                        <li>
                            <Link :href="route('ministries.youth')" class="text-slate-700 hover:text-accent">Youth Ministry</Link>
                        </li>
                        <li>
                            <Link :href="route('ministries.adults')" class="text-slate-700 hover:text-accent">Adult Groups</Link>
                        </li>
                        <li>
                            <Link :href="route('connect')" class="text-slate-700 hover:text-accent">Volunteer</Link>
                        </li>
                        <li>
                            <a :href="givingUrl" target="_blank" rel="noopener noreferrer" class="text-slate-700 hover:text-accent">
                                Give
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">Visit</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <Link :href="route('home')" class="text-slate-700 hover:text-accent">Join Us This Sunday</Link>
                        </li>
                        <li>
                            <Link :href="route('start-here')" class="text-slate-700 hover:text-accent">Plan a Visit</Link>
                        </li>
                        <li>
                            <Link :href="route('connect')" class="text-slate-700 hover:text-accent">Contact Us</Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-xs font-semibold uppercase tracking-wider text-primary">Legal</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <!-- Full page load: legal pages are Blade + Termageddon (window "load"). -->
                            <a :href="route('privacy-policy')" class="text-slate-700 hover:text-accent">Privacy Policy</a>
                        </li>
                        <li>
                            <a :href="route('terms')" class="text-slate-700 hover:text-accent">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 flex flex-col items-end gap-2 border-t border-neutral-tan/50 pt-8 text-right text-xs text-slate-500">
                <p>
                    <a
                        href="https://www.empoweredcreative.co"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-slate-700 hover:text-accent"
                    >Powered by Empowered Creative</a>
                </p>
                <p>&copy; {{ new Date().getFullYear() }} New Life Bible Church. All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>
