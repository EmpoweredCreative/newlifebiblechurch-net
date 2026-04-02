<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import { Bars3Icon, ChevronDownIcon, XMarkIcon } from '@heroicons/vue/24/outline';
import { computed, ref } from 'vue';
import { route } from 'ziggy-js';

const page = usePage();
const open = ref(false);

const current = computed(() => page.url);

function isActive(path) {
    if (path === '/') {
        return current.value === '/';
    }
    return current.value.startsWith(path);
}

const navClass = (path) =>
    isActive(path)
        ? 'bg-accent text-white'
        : 'text-primary hover:bg-neutral-tan/40';

const givingUrl = 'https://newlifebible.churchcenter.com/giving/to/general';
</script>

<template>
    <header class="sticky top-0 z-50 border-b border-neutral-tan/50 bg-surface-light/95 backdrop-blur-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3 md:px-6 lg:px-8">
            <Link :href="route('home')" class="flex shrink-0 items-center gap-2">
                <img
                    src="/images/logos/NLBC_LogoPrimary_color.png"
                    alt="New Life Bible Church"
                    class="h-10 w-auto md:h-12"
                />
            </Link>

            <!-- Desktop -->
            <nav class="hidden items-center gap-1 lg:flex">
                <Link
                    :href="route('home')"
                    :class="['rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide', navClass('/')]"
                >
                    Home
                </Link>
                <Link
                    :href="route('start-here')"
                    :class="['rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide', navClass('/start-here')]"
                >
                    Start Here
                </Link>
                <Link
                    :href="route('who-we-are')"
                    :class="['rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide', navClass('/who-we-are')]"
                >
                    Who We Are
                </Link>
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                        <MenuButton
                            :class="[
                                'inline-flex items-center gap-1 rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide',
                                isActive('/ministries') ? 'bg-accent text-white' : 'text-primary hover:bg-neutral-tan/40',
                            ]"
                        >
                            Ministries
                            <ChevronDownIcon class="h-4 w-4" aria-hidden="true" />
                        </MenuButton>
                    </div>
                    <transition
                        enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0"
                        enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-in"
                        leave-from-class="transform scale-100 opacity-100"
                        leave-to-class="transform scale-95 opacity-0"
                    >
                        <MenuItems
                            class="absolute left-0 z-20 mt-1 w-56 origin-top-left border border-neutral-tan/60 bg-white py-1 shadow-lg focus:outline-none"
                        >
                            <MenuItem v-slot="{ active }">
                                <Link
                                    :href="route('ministries')"
                                    :class="[active ? 'bg-surface-cream' : '', 'block px-4 py-2 text-sm text-primary']"
                                >
                                    Overview
                                </Link>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <Link
                                    :href="route('ministries.kids')"
                                    :class="[active ? 'bg-surface-cream' : '', 'block px-4 py-2 text-sm text-primary']"
                                >
                                    Kids Ministry
                                </Link>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <Link
                                    :href="route('ministries.youth')"
                                    :class="[active ? 'bg-surface-cream' : '', 'block px-4 py-2 text-sm text-primary']"
                                >
                                    Youth Ministry
                                </Link>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <Link
                                    :href="route('ministries.adults')"
                                    :class="[active ? 'bg-surface-cream' : '', 'block px-4 py-2 text-sm text-primary']"
                                >
                                    Adult Groups
                                </Link>
                            </MenuItem>
                        </MenuItems>
                    </transition>
                </Menu>
                <Link
                    :href="route('media')"
                    :class="['rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide', navClass('/media')]"
                >
                    Media
                </Link>
                <Link
                    :href="route('connect')"
                    :class="['rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide', navClass('/connect')]"
                >
                    Connect
                </Link>
                <a
                    :href="givingUrl"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40"
                >
                    Give
                </a>
            </nav>

            <button
                type="button"
                class="inline-flex rounded-sm p-2 text-primary lg:hidden"
                aria-label="Toggle menu"
                @click="open = !open"
            >
                <Bars3Icon v-if="!open" class="h-7 w-7" />
                <XMarkIcon v-else class="h-7 w-7" />
            </button>
        </div>

        <!-- Mobile panel -->
        <div v-if="open" class="border-t border-neutral-tan/50 bg-surface-light px-4 py-4 lg:hidden">
            <nav class="flex flex-col gap-1">
                <Link :href="route('home')" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary" @click="open = false">
                    Home
                </Link>
                <Link :href="route('start-here')" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary" @click="open = false">
                    Start Here
                </Link>
                <Link :href="route('who-we-are')" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary" @click="open = false">
                    Who We Are
                </Link>
                <Link :href="route('ministries')" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary" @click="open = false">
                    Ministries
                </Link>
                <Link :href="route('ministries.kids')" class="rounded-sm px-3 py-2 pl-6 text-sm text-primary" @click="open = false">
                    Kids Ministry
                </Link>
                <Link :href="route('ministries.youth')" class="rounded-sm px-3 py-2 pl-6 text-sm text-primary" @click="open = false">
                    Youth Ministry
                </Link>
                <Link :href="route('ministries.adults')" class="rounded-sm px-3 py-2 pl-6 text-sm text-primary" @click="open = false">
                    Adult Groups
                </Link>
                <Link :href="route('media')" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary" @click="open = false">
                    Media
                </Link>
                <Link :href="route('connect')" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary" @click="open = false">
                    Connect
                </Link>
                <a
                    :href="givingUrl"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary"
                    @click="open = false"
                >
                    Give
                </a>
            </nav>
        </div>
    </header>
</template>
