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
            'stats' => [
                ['Daily', 'campus patrons search the OPAC I maintain'],
                ['3', 'production systems shipped for USeP Library'],
                ['AI', 'Whisper + Llama pipelines in BUKLAT'],
            ],
            'now' => 'Open to opportunities — systems, support & infosec roles',
            'featured' => ['opac', 'ulrc', 'buklat'],
            'howto' => 'The sidebar works like a file explorer. Open any folder, then open a file to see the full case study with my role, process and results.',
        ],

        'opac' => [
            'title' => 'library-opac.sys', 'icon' => '📚', 'kind' => 'case', 'cover' => $grad('#0f2744', '#3d6fa5'),
            'thumb' => null,
            'tags' => ['PHP', 'OPAC', 'Library', 'Deployed'], 'role' => 'Developer & maintainer — USeP Tagum–Mabini Campus Library',
            'summary' => 'The public access catalog and login system now powering the University of Southeastern Philippines Tagum–Mabini Campus Library.',
            'outcome' => 'Patrons search the collection in real time; staff track every issue and return from one desk.',
            'stats' => [['Daily', 'campus patron use'], ['Full', 'catalog import / export'], ['QR', 'accession tagging & inventory']],
            'did' => [
                'Patrons couldn’t reliably search the collection — built a full public access catalog with real-time availability.',
                'Staff needed accountability — added login/logout session logging with a complete admin side for library staff.',
                'Catalogs lived in spreadsheets — shipped import/export, reports, and QR accession tagging for every item.',
                'In-house borrowing was manual — issue and return books against imported student records from one desk.',
                'Still maintained day-to-day as the campus library’s IT Specialist — Linux servers, network and all.',
            ],
        ],

        'ulrc' => [
            'title' => 'ulrc-appointment.app', 'icon' => '📅', 'kind' => 'case',
            'cover' => $grad('#4a1520', '#8c2f3f'), 'coverImage' => '/images/projects/ulrc-appointment.png',
            'thumb' => '/images/projects/ulrc-appointment.png',
            'pcFrame' => true,
            'tags' => ['Laravel 13', 'Vue 3', 'Sanctum', 'SPA'], 'role' => 'Developer — Library Online Booking System (USeP)',
            'summary' => 'An online appointment system that lets students and faculty book librarian meetings, library cards and Turnitin checks — with live staff calendars behind it.',
            'outcome' => 'Students book 4 library services in 15-minute slots without chat or walk-in chaos.',
            'stats' => [['4', 'library services online'], ['15 min', 'snapped booking slots'], ['3', 'roles: patron / staff / admin']],
            'did' => [
                'Walk-ins and chat scheduling didn’t scale — replaced them with a Laravel 13 API and Vue 3 SPA backed by Sanctum tokens.',
                'Double-bookings and awkward gaps — calendars snap to a 15-minute step so no unbookable slivers ever appear.',
                'Mixed trust levels — role boundaries let patrons manage only their own appointments while staff run the desk.',
                'Patrons couldn’t see free slots — requirements checklists, walk-ins, and a live availability popup in the header.',
                'One portal wasn’t enough — separate user and administrator portals, built as part of my library role.',
            ],
        ],

        'buklat' => [
            'title' => 'buklat.ai', 'icon' => '🧠', 'kind' => 'case',
            'cover' => $grad('#0b3d91', '#4f83cc'), 'coverImage' => '/images/projects/buklat-signin.jpg',
            'thumb' => '/images/projects/buklat-signin.jpg',
            'phoneFrame' => true,
            'tags' => ['Flutter', 'AI', 'Whisper', 'Offline-first'], 'role' => 'Main front-end developer — capstone, USeP',
            'summary' => 'BUKLAT is a cross-platform, AI-driven reading comprehension assessment and intervention system for Grades 4–6 — speech recognition, miscue detection and auto-generated quizzes, fully usable offline.',
            'outcome' => 'Teachers score oral reading in minutes; students keep learning when the network drops.',
            'stats' => [['7', 'miscue types caught by AI'], ['3', 'Phil-IRI reading levels'], ['3', 'platforms, one codebase']],
            'did' => [
                'Classrooms lose connectivity mid-lesson — Flutter/Dart ships Android, Windows and Web from one offline-first codebase.',
                'Manual miscue scoring is slow — Whisper + Vosk transcribe every reading and flag mispronunciations, omissions, substitutions and more.',
                'Writing good quizzes eats teacher time — Llama and spaCy generate literal, inferential and critical questions from any uploaded story.',
                'Students can read for each other — voice login and speaker verification, with sync when the network comes back.',
                'Leadership needed visibility — teacher and admin dashboards with STCR, Class Reading Profile and Individual Summary reports in PDF and Excel.',
            ],
        ],

        'about' => [
            'title' => 'about.md', 'icon' => '👤', 'kind' => 'about',
            'photo' => '/images/kaiser.png',
            'tagline' => 'IT Professional | Aspiring Full-Stack Developer | UI/UX Enthusiast',
            'intro' => "Hello, I'm Kaiser Zamora. I'm an Information Technology professional with a background in Information Security and a growing passion for building meaningful digital experiences — turning ideas and complex problems into functional, intuitive, and visually engaging solutions.",
            'bio' => [
                'My interests span web development, application development, system design, and user interface and experience design. Through academic projects and professional work I’ve built real systems: library management solutions, digital appointment platforms, and AI-powered educational applications.',
                'I believe good software isn’t only about making things work — it’s about making it useful, accessible, understandable, and enjoyable to use. I’m continuously learning, experimenting with technologies, and refining how I create better digital solutions.',
            ],
            'philosophy' => 'Build with purpose. Design with people in mind. Improve with every iteration.',
            'tech' => [
                ['Frontend', 'Vue.js, Tailwind CSS, HTML, CSS, JavaScript'],
                ['Backend', 'PHP, Laravel exposure, system logic'],
                ['Mobile', 'Flutter, Dart'],
                ['Database', 'MySQL, SQL'],
                ['Design', 'UI/UX, responsive design, prototyping'],
                ['Tools', 'Git, VS Code, Laragon, Figma'],
                ['AI', 'Local AI models, LLM integration concepts'],
            ],
            'workflow' => [
                ['Understand the Problem', 'Before writing code, I clarify purpose, user needs, and the actual problem we’re solving.'],
                ['Research & Plan', 'I study existing approaches, define requirements, and organize the features needed to move forward.'],
                ['Design the Experience', 'I shape navigation, layouts, responsiveness, and accessibility so the system feels intuitive.'],
                ['Develop & Build', 'I turn designs and requirements into functional apps, building incrementally with maintainable code.'],
                ['Test & Refine', 'I test functionality, find bugs, watch real interactions, and iterate — a working system can always improve.'],
                ['Learn & Improve', 'Every project is a chance to explore better tools and approaches and level up the craft.'],
            ],
            'qualities' => [
                ['Development Mindset', 'I enjoy building functional systems and solving technical challenges through code.'],
                ['UI/UX Thinking', 'I value clean interfaces, intuitive interactions, and thoughtful user experiences.'],
                ['Problem Solver', 'I look beyond the obvious and explore practical ways to improve existing processes.'],
                ['Continuous Learner', 'I’m always exploring technologies, improving my skills, and learning through experience.'],
            ],
            'principles' => [
                'Ship it — a deployed system beats a perfect prototype.',
                'Access control and security from the first line, not the last.',
                'Offline-first, because real classrooms have real connectivity gaps.',
            ],
            'tools' => ['Laravel', 'Vue', 'Flutter', 'Dart', 'PHP', 'Linux', 'MySQL', 'Firebase', 'Whisper AI', 'Figma', 'Git'],
        ],

        'resume' => [
            'title' => 'resume.pdf', 'icon' => '📑', 'kind' => 'resume',
            'subtitle' => 'Kaiser T. Zamora · Tagum City, Davao del Norte · 0991 221 1044 (DITO)',
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
                ['Main Front-end Developer, USeP ITPR 401 — BUKLAT Capstone', 'Aug 12 — Dec 11, 2025', 'University of Southeastern Philippines — built BUKLAT, the capstone AI-driven reading comprehension assessment and intervention system.'],
                ['Main Front-end Developer, USeP ITPR 401 — Library Systems', 'Jun 16 — Aug 6, 2025', 'University of Southeastern Philippines — front-end development for university library systems.'],
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
                '2025' => [
                    'Empowering Innovation through AI: From Autonomous Agents to Analytics Insights, CIC USeP (Nov 5, 2025)',
                    'Career Booster 2025 — Career and Alumni Center, USeP (Aug 20, 2025)',
                ],
                '2024' => [
                    'ICTCON 2024 — Emerging Technologies, Digital Governance, Cloud, Web Development & Front/Back-End workshops (Oct 15–18, 2024)',
                    'DICT Cybersecurity Seminar — Society of Information Security, USeP (Mar 22, 2024)',
                    "University Assessment and Guidance Career's Group Guidance Session, UAGC USeP (Mar 8, 2024)",
                ],
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
                ['LinkedIn', 'https://www.linkedin.com/in/kaiser-zamora-724073450'],
                ['USeP Email', 'mailto:ktzamora00048@usep.edu.ph'],
                ['Facebook', 'https://www.facebook.com/kaiser.zamora.5'],
                ['GitHub', 'https://github.com/zkaiser546'],
            ],
        ],
    ],
];
