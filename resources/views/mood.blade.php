<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Mood Tracker</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script>
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#19e65e",
                        "background-light": "#ffffff",
                        "background-dark": "#112116",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="font-display bg-background-light dark:bg-background-dark transition-colors duration-300">
    <div
        class="relative flex min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
        <!-- Top App Bar -->
        <div
            class="flex items-center bg-background-light dark:bg-background-dark p-4 pb-2 justify-between sticky top-0 z-10">
            <div class="flex size-12 shrink-0 items-center justify-start">
                <span class="material-symbols-outlined text-gray-800 dark:text-gray-200">
                    sentiment_very_satisfied
                </span>
            </div>
            <h2 class="text-gray-900 dark:text-gray-100 text-lg font-bold leading-tight tracking-[-0.015em] flex-1">
                Mood
                Tracker</h2>
            <div class="flex w-12 items-center justify-end">
                <button id="theme-toggle"
                    class="p-2 rounded-full text-gray-900 dark:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                    <span id="theme-icon" class="material-symbols-outlined">
                        dark_mode
                    </span>
                </button>

                <!-- Restart -->
                <form action="{{ route('mood.reset') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus semua data mood?')">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="p-2 rounded-full text-gray-900 dark:text-gray-100 hover:bg-red-100 dark:hover:bg-red-900 transition"
                        title="Restart">
                        <span class="material-symbols-outlined">
                            restart_alt
                        </span>
                    </button>
                </form>
            </div>
        </div>
        <main class="flex-1 px-4 py-6">
            <!-- Headline Text -->
            <h1
                class="text-gray-900 dark:text-gray-100 tracking-tight text-[32px] font-bold leading-tight text-center pb-3">
                How are you feeling today?</h1>
            <!-- Text Grid for Moods -->
            <form action="{{ route('mood.store') }}" method="post">
                @csrf

                <div class="flex justify-center pt-6">
                    <div class="grid grid-cols-4 gap-3 place-items-center">

                        <!-- Happy -->
                        <div
                            class="flex flex-col gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-4 items-center justify-center cursor-pointer w-72 h-72">
                            <span class="material-symbols-outlined text-4xl text-yellow-500">
                                sentiment_very_satisfied
                            </span>

                            <button type="submit" name="mood" value="Happy"
                                class="mood-btn text-gray-900 dark:text-gray-100 text-base font-bold">
                                Happy
                            </button>
                        </div>

                        <!-- Neutral -->
                        <div
                            class="flex flex-col gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-4 items-center justify-center cursor-pointer w-72 h-72">
                            <span class="material-symbols-outlined text-4xl text-blue-500">
                                sentiment_neutral
                            </span>

                            <button type="submit" name="mood" value="Neutral"
                                class="mood-btn text-gray-900 dark:text-gray-100 text-base font-bold">
                                Neutral
                            </button>
                        </div>

                        <!-- Sad -->
                        <div
                            class="flex flex-col gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-4 items-center justify-center cursor-pointer w-72 h-72">
                            <span class="material-symbols-outlined text-4xl text-indigo-500">
                                sentiment_sad
                            </span>

                            <button type="submit" name="mood" value="Sad"
                                class="mood-btn text-gray-900 dark:text-gray-100 text-base font-bold">
                                Sad
                            </button>
                        </div>

                        <!-- Angry -->
                        <div
                            class="flex flex-col gap-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-4 items-center justify-center cursor-pointer w-72 h-72">
                            <span class="material-symbols-outlined text-4xl text-red-500">
                                sentiment_frustrated
                            </span>

                            <button type="submit" name="mood" value="Angry"
                                class="mood-btn text-gray-900 dark:text-gray-100 text-base font-bold">
                                Angry
                            </button>
                        </div>

                    </div>
                </div>
            </form>

            <!-- Body Text / Confirmation -->
            <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal pt-8 pb-3 text-center">
                Thank
                you for sharing!</p>
            <!-- Section Header -->
            <h2
                class="text-gray-900 dark:text-gray-100 text-[22px] font-bold leading-tight tracking-[-0.015em] pt-8 pb-4 text-center">
                This Week's Overview</h2>
            <!-- Statistics Card -->
            <div class="flex justify-center">
                <div
                    class="w-full max-w-3xl rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-6 flex flex-col md:flex-row items-center gap-6">
                    <!-- Donut Chart -->
                    <div class="relative w-36 h-36 flex items-center justify-center">
                        <svg class="transform -rotate-90" viewBox="0 0 120 120">
                            <circle cx="60" cy="60" r="54" fill="none" stroke="#e6e6e6"
                                stroke-width="12"></circle>

                            @php
                                $circumference = 339.29;
                                $offset = 0;
                                $colors = [
                                    'happy' => '#fbbf24',
                                    'neutral' => '#3b82f6',
                                    'sad' => '#818cf8',
                                    'angry' => '#ef4444',
                                ];
                            @endphp

                            @foreach ($percent as $mood => $value)
                                @php
                                    $length = $circumference * ($value / 100);
                                    $offsetValue = $circumference - $length - $offset;
                                    $offset += $length;
                                @endphp
                                <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="{{ $colors[$mood] }}" stroke-dasharray="{{ $circumference }}"
                                    stroke-dashoffset="{{ $offsetValue }}" stroke-width="12" stroke-linecap="round" />
                            @endforeach
                        </svg>

                        <div class="absolute flex flex-col items-center">
                            <span class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $total }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">Entries</span>
                        </div>
                    </div>

                    <!-- Legend -->
                    <div class="flex flex-col gap-3 flex-1">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <span class="ml-auto font-semibold text-gray-900 dark:text-gray-100">
                                Happy: {{ $percent['happy'] }}%
                            </span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                            <span class="ml-auto font-semibold text-gray-900 dark:text-gray-100">
                                Neutral: {{ $percent['neutral'] }}%
                            </span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-indigo-500"></div>
                            <span class="ml-auto font-semibold text-gray-900 dark:text-gray-100">
                                Sad: {{ $percent['sad'] }}%
                            </span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <span class="ml-auto font-semibold text-gray-900 dark:text-gray-100">
                                Angry: {{ $percent['angry'] }}%
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="h-10"></div>
        </main>
    </div>
    <script>
        document.getElementById('restart-button').addEventListener('click', () => {
            window.location.reload();
        });

        const html = document.documentElement;
        const button = document.getElementById('theme-toggle');
        const icon = document.getElementById('theme-icon');

        function updateTheme() {
            if (html.classList.contains('dark')) {
                icon.textContent = 'light_mode';
            } else {
                icon.textContent = 'dark_mode';
            }
        }

        updateTheme();

        button.addEventListener('click', () => {
            html.classList.toggle('dark');

            if (html.classList.contains('dark')) {
                localStorage.theme = 'dark';
            } else {
                localStorage.theme = 'light';
            }

            updateTheme();
        });
    </script>

</body>

</html>
