<?php

// Edit this file to change what shows on your portfolio.
// "tree" is the sidebar. Each leaf { id } points to an entry in "files".

$grad = fn (string $a, string $b): string => "linear-gradient(135deg,$a,$b)";

return [
    'owner' => [
        'name' => 'Kaiser T. Zamora',
        'role' => 'IT Specialist — USeP Library',
        'status' => 'Employed • Open to opportunities',
        'available' => 'IT Specialist · USeP Tagum–Mabini Campus Library',
        'photo' => '/images/kaiser.png',
    ],

    'tree' => [
        ['id' => 'readme'],
        ['name' => 'projects', 'open' => true, 'kids' => [
            ['name' => 'library-systems', 'open' => true, 'kids' => [['id' => 'opac'], ['id' => 'ulrc']]],
            ['name' => 'ai-apps', 'kids' => [['id' => 'buklat']]],
        ]],
        ['id' => 'about'],
        ['id' => 'resume'],
        ['id' => 'contact'],
    ],

    'files' => [
        'readme' => [
            'title' => 'README.md', 'icon' => '📄', 'kind' => 'home',
            'headline' => 'Kaiser T. Zamora keeps a university library running — and builds it too.',
            'intro' => "I'm the IT Specialist at the USeP Tagum–Mabini Campus Library. I maintain the OPAC patrons search every day, develop the library's online booking system, administer the Linux servers, and keep the network healthy. Before the job title, I shipped BUKLAT — an offline-first AI reading assessment app — as my capstone. I research first, design second, and ship the code myself.",
            'meta' => [
                ['Status', 'Open to opportunities', true],
                ['Role', 'IT Specialist · USeP Library'],
                ['Location', 'Tagum City, Davao del Norte'],
                ['Graduated', 'BSIT — June 2026'],
            ],
            'cta' => [
                ['label' => 'See the campus OPAC', 'go' => 'opac', 'primary' => true],
                ['label' => 'Open resume', 'go' => 'resume'],
                ['label' => 'Contact me', 'go' => 'contact'],
            ],
            'stats' => [['Live', 'OPAC I maintain in daily campus use'], ['Now', 'IT Specialist, USeP Library'], ['AI', 'Whisper & Llama pipelines']],
            'featured' => ['opac', 'ulrc', 'buklat'],
            'howto' => 'The sidebar works like a file explorer. Open any folder, then open a file to see the full case study with my role, process and results.',
        ],

        'opac' => [
            'title' => 'library-opac.sys', 'icon' => '📚', 'kind' => 'case', 'cover' => $grad('#0f2744', '#3d6fa5'),
            'thumb' => null,
            'tags' => ['PHP', 'OPAC', 'Library', 'Deployed'], 'role' => 'Developer & maintainer — USeP Tagum–Mabini Campus Library',
            'summary' => 'The public access catalog and login system now powering the University of Southeastern Philippines Tagum–Mabini Campus Library.',
            'stats' => [['Live', 'in daily campus use'], ['100%', 'catalog import / export'], ['QR', 'accession tagging & inventory']],
            'did' => [
                'Full public access catalog — search the entire collection and check book availability in real time.',
                'Login / logout session logging with a complete admin side for library staff.',
                'Import and export catalogs, generate reports, and tag every item with QR codes.',
                'Inventory plus in-house borrowing: issue and return books against imported student records.',
                'Maintained day-to-day as the campus library\u2019s IT Specialist — Linux servers, network and all.',
            ],
        ],

        'ulrc' => [
            'title' => 'ulrc-appointment.app', 'icon' => '📅', 'kind' => 'case',
            'cover' => $grad('#4a1520', '#8c2f3f'), 'coverImage' => '/images/projects/ulrc-appointment.png',
            'thumb' => '/images/projects/ulrc-appointment.png',
            'pcFrame' => true,
            'tags' => ['Laravel 13', 'Vue 3', 'Sanctum', 'SPA'], 'role' => 'Developer — Library Online Booking System (USeP)',
            'summary' => 'An online appointment system that lets students and faculty book librarian meetings, library cards and Turnitin checks — with live staff calendars behind it.',
            'stats' => [['4', 'library services online'], ['15 min', 'snapped booking slots'], ['3', 'roles: patron / staff / admin']],
            'did' => [
                'Laravel 13 API with Sanctum token auth and a Vue 3 single-page frontend.',
                'Service calendars snap to a configurable time step, so no unbookable time slivers ever appear.',
                'Role-based boundaries: patrons manage only their own appointments; staff and superadmins run the desk.',
                'Requirements checklists, walk-ins and a live "See Booking Availability" popup right in the header.',
                'Separate user and administrator portals — built and maintained as part of my library role.',
            ],
        ],

        'buklat' => [
            'title' => 'buklat.ai', 'icon' => '🧠', 'kind' => 'case',
            'cover' => $grad('#0b3d91', '#4f83cc'), 'coverImage' => '/images/projects/buklat-signin.jpg',
            'thumb' => '/images/projects/buklat-signin.jpg',
            'phoneFrame' => true,
            'tags' => ['Flutter', 'AI', 'Whisper', 'Offline-first'], 'role' => 'Main front-end developer — capstone, USeP',
            'summary' => 'BUKLAT is a cross-platform, AI-driven reading comprehension assessment and intervention system for Grades 4–7 — speech recognition, miscue detection and auto-generated quizzes, fully usable offline.',
            'stats' => [['7', 'miscue types caught by AI'], ['3', 'Phil-IRI reading levels'], ['3', 'platforms, one codebase']],
            'did' => [
                'Flutter/Dart across Android, Windows and Web from a single codebase.',
                'Whisper + Vosk transcribe every reading session and flag mispronunciations, omissions, substitutions, insertions and more.',
                'Llama AI and spaCy generate literal, inferential and critical comprehension questions from any story a teacher uploads.',
                'Voice login and speaker verification stop one student reading for another — and everything syncs when you are back online.',
                'Teacher and admin dashboards with STCR, Class Reading Profile and Individual Summary reports in PDF and Excel.',
            ],
        ],

        'about' => [
            'title' => 'about.md', 'icon' => '👤', 'kind' => 'about',
            'photo' => '/images/kaiser.png',
            'intro' => "I'm Kaiser T. Zamora, IT Specialist at the University of Southeastern Philippines Tagum–Mabini Campus Library. I maintain the OPAC and network our patrons rely on, develop the library's online booking system, and administer the Linux servers. I graduated BSIT major in Information Security in June 2026 — and my capstone BUKLAT put AI reading assessment into teachers' hands.",
            'principles' => [
                'Ship it — a deployed system beats a perfect prototype.',
                'Access control and security from the first line, not the last.',
                'Offline-first, because real classrooms have real connectivity gaps.',
            ],
            'tools' => ['Laravel', 'Vue', 'Flutter', 'Dart', 'PHP', 'Linux', 'MySQL', 'Firebase', 'Whisper AI', 'Canva'],
        ],

        'resume' => [
            'title' => 'resume.pdf', 'icon' => '📑', 'kind' => 'resume',
            'subtitle' => 'Kaiser T. Zamora · Prk. Lynville, Brgy. Mankilam, Tagum City, Davao del Norte · 0991 221 1044 (DITO)',
            'experience' => [
                ['IT Specialist / Technical Staff (Library) — Virtual Services Staff', 'Aug 24, 2026 — Present', 'University of Southeastern Philippines – Tagum-Mabini Campus Library', [
                    'Provide online customer service — respond to emails, handle inquiries and assist library patrons.',
                    "Manage the library's official Facebook page: promotional posts, service announcements and updates.",
                    "Maintain and improve the library's Online Public Access Catalog (OPAC).",
                    'Develop and maintain an online booking system for library services, with separate user and administrator portals.',
                    'Configure, monitor and maintain the library network infrastructure; administer Linux-based servers.',
                    'Perform computer maintenance, hardware repairs and software troubleshooting.',
                    'Prepare and organize library statistical reports using Microsoft Excel.',
                    'Design promotional materials, announcements and informational graphics using Canva.',
                ]],
                ['Main Front-end Developer, USeP ITPR 401 (IT Practicum)', 'Aug 12 — Dec 11, 2025', 'University of Southeastern Philippines — built BUKLAT, the capstone AI-driven reading comprehension assessment and intervention system.'],
                ['Main Front-end Developer, USeP ITPR 401 (IT Practicum)', 'Jun 16 — Aug 6, 2025', 'University of Southeastern Philippines — front-end development for university library systems.'],
            ],
            'education' => 'BS Information Technology, Major in Information Security — College of Teacher Education and Technology (CTET), University of Southeastern Philippines (USeP), Tagum–Mabini Campus. June 26, 2026.',
            'skills' => [
                'Software & Web Application Development',
                'Linux Server Administration & Network Setup',
                'Hardware & Software Troubleshooting',
                'Technical Support & Online Customer Service',
                'Information Security & Cybersecurity Fundamentals',
                'Social Media Management & Graphic Design (Canva)',
                'Excel Reporting & Data Handling',
                'System Analysis & Problem-Solving',
            ],
            'trainings' => [
                'Plenary 1 — "The Future of ICT: Emerging Technologies and Predictions", ICTCON 2024 (Oct 15, 2024)',
                'Workshop 1 — "Blockchain and Web3 Deployment", ICTCON 2024 (Oct 15, 2024)',
                'Plenary 2 — "Digital Governance: Balancing Innovation and Security", ICTCON 2024 (Oct 16, 2024)',
                'Plenary 3 — "Navigating the Data Center and Cloud Landscape", ICTCON 2024 (Oct 17, 2024)',
                'Workshop 3 — "Advanced GIT Techniques and Best Practices in Version Control", ICTCON 2024 (Oct 17, 2024)',
                'Plenary 4 — "The Future of Web Development: Emerging Trends and Technologies", ICTCON 2024 (Oct 18, 2024)',
                'Workshop 4 — "Building with the Latest Front-End Tools and Creating Robust Back-End Systems", ICTCON 2024 (Oct 18, 2024)',
                'DICT Cybersecurity Seminar — Society of Information Security, USeP (Mar 22, 2024)',
                "University Assessment and Guidance Career's Group Guidance Session, UAGC USeP (Mar 8, 2024)",
                'Career Booster 2025 — Career and Alumni Center, USeP (Aug 20, 2025)',
                'Empowering Innovation through AI: From Autonomous Agents to Analytics Insights, CIC USeP (Nov 5, 2025)',
            ],
            'pdf' => '/resume.pdf',
        ],

        'contact' => [
            'title' => 'contact.md', 'icon' => '✉️', 'kind' => 'contact',
            'intro' => "I'm an IT Specialist at the USeP Tagum–Mabini Campus Library — open to technical support, systems and information-security roles, remote or on-site. I reply within one day.",
            'email' => 'zakiser546@gmail.com',
            'phone' => '0991 221 1044 (DITO)',
            'location' => 'Tagum City, Davao del Norte, Philippines',
            'reply' => 'Within one day',
            'links' => [
                ['USeP Email', 'mailto:ktzamora00048@usep.edu.ph'],
                ['Facebook', 'https://www.facebook.com/kaiser.zamora.5'],
                ['GitHub', 'https://github.com/zkaiser546'],
            ],
        ],
    ],
];
