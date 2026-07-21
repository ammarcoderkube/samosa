<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samasa — Hot, folded, yours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Nunito+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --cream: #fff7e6;
            --ink: #2b1a0f;
            --chili: #ef4d2a;
            --chili-deep: #d63a1a;
            --mango: #ffb703;
            --mint: #4ca678;
            --mint-deep: #2f7a53;
            --grape: #8b3a9e;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            background: var(--cream);
            color: var(--ink);
            font-family: 'Nunito Sans', sans-serif;
            overflow-x: hidden;
        }

        body {
            background-image:
                radial-gradient(circle, rgba(43, 26, 15, 0.09) 1.6px, transparent 1.6px);
            background-size: 22px 22px;
            background-color: var(--cream);
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        /* ---------- NAV ---------- */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1240px;
            margin: 0 auto;
            padding: 26px 32px 0;
        }

        .wordmark {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 1.7rem;
            color: var(--ink);
            letter-spacing: -0.01em;
        }

        .wordmark img {
            width: 200px;
            height: 120px;
        }

        .nav-links {
            display: flex;
            gap: 2.2rem;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--ink);
        }

        .nav-links a {
            position: relative;
            transition: color .2s ease;
        }

        .nav-links a:hover {
            color: var(--chili);
        }

        .nav-links a:focus-visible {
            outline: 2px solid var(--chili);
            outline-offset: 4px;
            border-radius: 2px;
        }

        .nav-order {
            font-family: 'Baloo 2', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            padding: 0.65rem 1.4rem;
            background: var(--ink);
            color: var(--cream);
            border-radius: 999px;
            border: 2px solid var(--ink);
            transition: transform .15s ease, background .15s ease;
        }

        .nav-order:hover {
            background: var(--chili);
            border-color: var(--chili);
            transform: translateY(-2px) rotate(-1deg);
        }

        .nav-order:focus-visible {
            outline: 2px solid var(--chili);
            outline-offset: 3px;
        }

        .nav-right-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-cart-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: #ffffff;
            color: var(--ink);
            border: 2.5px solid var(--ink);
            padding: 0.45rem 0.95rem 0.45rem 0.75rem;
            border-radius: 999px;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 1rem;
            cursor: pointer;
            box-shadow: 3px 3px 0 var(--ink);
            transition: transform 0.15s ease, background 0.15s ease, box-shadow 0.15s ease;
            position: relative;
        }

        .nav-cart-btn:hover {
            background: var(--mango);
            transform: translateY(-2px);
            box-shadow: 4px 4px 0 var(--ink);
        }

        .nav-cart-btn:active {
            transform: translateY(0);
            box-shadow: 2px 2px 0 var(--ink);
        }

        .cart-icon-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .samosa-cart-svg {
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .nav-cart-btn:hover .samosa-cart-svg {
            transform: rotate(-10deg) scale(1.1);
        }

        .cart-count-badge {
            background: var(--chili);
            color: var(--cream);
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.85rem;
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            border-radius: 999px;
            border: 1.8px solid var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 1px 1px 0 var(--ink);
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.2s ease;
        }

        .cart-bounce .cart-icon-wrapper {
            animation: samosaPop 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .cart-bounce .cart-count-badge {
            animation: badgePulse 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes samosaPop {
            0% {
                transform: scale(1);
            }

            40% {
                transform: scale(1.35) rotate(-15deg);
            }

            80% {
                transform: scale(0.9) rotate(8deg);
            }

            100% {
                transform: scale(1) rotate(0deg);
            }
        }

        @keyframes badgePulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.4);
                background: var(--grape);
            }

            100% {
                transform: scale(1);
            }
        }

        /* ---------- CART & ORDER SIDEBAR ---------- */
        .cart-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(43, 26, 15, 0.55);
            backdrop-filter: blur(4px);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .cart-backdrop.active {
            opacity: 1;
            visibility: visible;
        }

        .cart-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            max-width: 440px;
            background: var(--cream);
            border-left: 4px solid var(--ink);
            box-shadow: -10px 0 30px rgba(43, 26, 15, 0.25);
            z-index: 9999;
            transform: translateX(100%);
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .cart-sidebar.open {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 1.4rem 1.6rem 1rem;
            background: #fff;
            border-bottom: 3px solid var(--ink);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-title {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--ink);
        }

        .sidebar-close-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--cream);
            border: 2.5px solid var(--ink);
            color: var(--ink);
            font-size: 1.2rem;
            font-weight: 800;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 0 var(--ink);
            transition: transform 0.15s ease, background 0.15s ease, color 0.15s ease;
        }

        .sidebar-close-btn:hover {
            background: var(--chili);
            color: var(--cream);
            transform: scale(1.08) rotate(90deg);
        }

        .sidebar-tabs {
            display: flex;
            background: var(--cream);
            border-bottom: 2.5px solid var(--ink);
            padding: 0.5rem 1.6rem 0;
            gap: 0.5rem;
        }

        .sidebar-tab {
            flex: 1;
            padding: 0.65rem 0.8rem;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.95rem;
            border: 2px solid transparent;
            border-bottom: none;
            border-radius: 12px 12px 0 0;
            background: transparent;
            color: #7a634e;
            cursor: pointer;
            text-align: center;
            transition: all 0.15s ease;
        }

        .sidebar-tab.active {
            background: #ffffff;
            color: var(--ink);
            border-color: var(--ink);
            box-shadow: 0 3px 0 #ffffff;
            position: relative;
            z-index: 2;
        }

        .sidebar-tab:hover:not(.active) {
            color: var(--chili);
            background: rgba(255, 255, 255, 0.5);
        }

        .sidebar-tab-badge {
            background: var(--chili);
            color: #fff;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 999px;
            margin-left: 4px;
        }

        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 1.4rem 1.6rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .tab-panel {
            display: none;
            flex-direction: column;
            gap: 1.2rem;
            height: 100%;
        }

        .tab-panel.active {
            display: flex;
        }

        .cart-empty-state {
            text-align: center;
            padding: 3rem 1rem;
            margin: auto 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .cart-empty-icon {
            width: 110px;
            height: 110px;
            background: var(--mango);
            border: 3.5px solid var(--ink);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 4px 4px 0 var(--ink);
            transform: rotate(-5deg);
        }

        .cart-empty-state h3 {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--ink);
        }

        .cart-empty-state p {
            font-size: 0.95rem;
            color: #5c4630;
            max-width: 26ch;
            font-weight: 600;
        }

        .cart-items-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .cart-item-card {
            display: flex;
            gap: 1rem;
            background: #ffffff;
            border: 2.5px solid var(--ink);
            border-radius: 16px;
            padding: 0.9rem;
            box-shadow: 3px 3px 0 var(--ink);
            align-items: center;
            transition: transform 0.15s ease;
        }

        .cart-item-card:hover {
            transform: translateY(-2px);
        }

        .cart-item-img {
            width: 65px;
            height: 65px;
            border-radius: 12px;
            border: 2px solid var(--ink);
            object-fit: cover;
            flex-shrink: 0;
            background: var(--mango);
        }

        .cart-item-info {
            flex: 1;
            min-width: 0;
        }

        .cart-item-title {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--ink);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cart-item-price {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--chili);
        }

        .cart-qty-controls {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 0.4rem;
        }

        .qty-btn {
            width: 26px;
            height: 26px;
            border-radius: 8px;
            background: var(--cream);
            border: 1.8px solid var(--ink);
            color: var(--ink);
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.1s ease;
        }

        .qty-btn:hover {
            background: var(--mango);
            transform: scale(1.1);
        }

        .qty-num {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.95rem;
            min-width: 20px;
            text-align: center;
        }

        .cart-item-total {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--ink);
            text-align: right;
        }

        .remove-item-btn {
            background: transparent;
            border: none;
            color: #a63a2f;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 2px 4px;
            margin-top: 4px;
            transition: color 0.15s ease;
        }

        .remove-item-btn:hover {
            color: var(--chili);
            text-decoration: underline;
        }

        .order-method-box {
            background: #ffffff;
            border: 2px solid var(--ink);
            border-radius: 14px;
            padding: 0.4rem;
            display: flex;
            gap: 0.4rem;
        }

        .method-option {
            flex: 1;
            text-align: center;
            padding: 0.5rem 0.8rem;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.9rem;
            border-radius: 10px;
            border: 2px solid transparent;
            background: transparent;
            color: var(--ink);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .method-option.selected {
            background: var(--mango);
            border-color: var(--ink);
            box-shadow: 2px 2px 0 var(--ink);
        }

        .sidebar-footer {
            padding: 1.2rem 1.6rem;
            background: #ffffff;
            border-top: 3px solid var(--ink);
            box-shadow: 0 -4px 15px rgba(43, 26, 15, 0.05);
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95rem;
            font-weight: 700;
            color: #5c4630;
        }

        .summary-row.total-row {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--ink);
            border-top: 2px dashed rgba(43, 26, 15, 0.2);
            padding-top: 0.6rem;
        }

        .checkout-btn {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            background: var(--chili);
            color: var(--cream);
            padding: 0.9rem;
            border-radius: 999px;
            border: 3px solid var(--ink);
            box-shadow: 4px 4px 0 var(--ink);
            cursor: pointer;
            text-align: center;
            transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .checkout-btn:hover {
            background: var(--chili-deep);
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 var(--ink);
        }

        .checkout-btn:disabled {
            background: #ccc;
            border-color: #888;
            color: #666;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }

        .order-card {
            background: #ffffff;
            border: 2.5px solid var(--ink);
            border-radius: 16px;
            padding: 1.2rem;
            box-shadow: 3.5px 3.5px 0 var(--ink);
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
        }

        .order-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px dashed rgba(43, 26, 15, 0.2);
            padding-bottom: 0.6rem;
        }

        .order-id {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 1.1rem;
            color: var(--ink);
        }

        .order-status-badge {
            background: var(--mint);
            color: #fff;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.8rem;
            padding: 0.2rem 0.6rem;
            border-radius: 999px;
            border: 1.5px solid var(--ink);
        }

        .tracker-steps {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            position: relative;
            padding-left: 1.4rem;
            margin-left: 0.5rem;
            border-left: 2.5px solid var(--mango);
        }

        .tracker-step {
            position: relative;
            font-size: 0.9rem;
            font-weight: 700;
            color: #7a634e;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .tracker-step::before {
            content: "";
            position: absolute;
            left: -1.75rem;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #fff;
            border: 2.5px solid var(--ink);
        }

        .tracker-step.completed {
            color: var(--ink);
        }

        .tracker-step.completed::before {
            background: var(--mint);
        }

        .tracker-step.active {
            color: var(--chili);
            font-weight: 800;
        }

        .tracker-step.active::before {
            background: var(--chili);
            box-shadow: 0 0 0 3px rgba(239, 77, 42, 0.3);
            animation: pulseStep 1.2s infinite alternate;
        }

        @keyframes pulseStep {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.3);
            }
        }

        @media (max-width:760px) {
            .nav-links {
                display: none;
            }

            .cart-sidebar {
                max-width: 100%;
            }
        }

        /* ---------- HERO ---------- */
        .hero {
            max-width: 1240px;
            margin: 0 auto;
            padding: 3.2rem 32px 5rem;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            align-items: center;
            gap: 1.5rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--cream);
            background: var(--mint-deep);
            padding: 0.5rem 1rem 0.5rem 0.7rem;
            border-radius: 999px;
            transform: rotate(-2deg);
            margin-bottom: 1.6rem;
        }

        .badge::before {
            content: "🌶️";
            font-size: 1rem;
        }

        h1 {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: clamp(2.7rem, 6vw, 4.8rem);
            line-height: 0.98;
            letter-spacing: -0.02em;
            color: var(--ink);
            max-width: 11ch;
        }

        h1 .hl {
            color: var(--chili);
            position: relative;
            display: inline-block;
        }

        h1 .hl2 {
            color: var(--mango);
            -webkit-text-stroke: 2px var(--ink);
            text-stroke: 2px var(--ink);
        }

        .lead {
            margin-top: 1.5rem;
            font-size: 1.15rem;
            font-weight: 600;
            line-height: 1.6;
            color: #5c4630;
            max-width: 36ch;
        }

        .cta-row {
            margin-top: 2.2rem;
            display: flex;
            align-items: center;
            gap: 1.2rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            font-family: 'Baloo 2', sans-serif;
            background: var(--chili);
            color: var(--cream);
            font-weight: 700;
            font-size: 1.05rem;
            padding: 1rem 2rem;
            border-radius: 999px;
            border: 3px solid var(--ink);
            box-shadow: 4px 4px 0 var(--ink);
            transition: transform .15s ease, box-shadow .15s ease;
            display: inline-block;
        }

        .btn-primary:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0 var(--ink);
        }

        .btn-primary:focus-visible {
            outline: 2px solid var(--ink);
            outline-offset: 3px;
        }

        .btn-secondary {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--ink);
            padding-bottom: 2px;
            border-bottom: 3px solid var(--mango);
            transition: color .18s ease, border-color .18s ease;
        }

        .btn-secondary:hover {
            color: var(--chili);
            border-color: var(--chili);
        }

        .btn-secondary:focus-visible {
            outline: 2px solid var(--chili);
            outline-offset: 4px;
        }

        .stat-strip {
            margin-top: 3rem;
            display: flex;
            gap: 2.4rem;
            flex-wrap: wrap;
        }

        .stat-strip div {
            display: flex;
            flex-direction: column;
            gap: 0.1rem;
            background: #fff;
            border: 2px solid var(--ink);
            border-radius: 16px;
            padding: 0.8rem 1.1rem;
            box-shadow: 3px 3px 0 var(--ink);
        }

        .stat-num {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--chili);
        }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #5c4630;
        }

        /* ---------- VISUAL ---------- */
        .visual {
            position: relative;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stage {
            position: relative;
            width: 450px;
            height: 450px;
            background: var(--mango);
            border-radius: 50%;
            border: 4px solid var(--ink);

        }

        .stage img {
            width: 150%;
            position: absolute;
            left: -50%;
            box-shadow: 3px black;
        }

        .samosa {
            position: relative;
            width: 230px;
            height: 230px;
            transform: rotate(-4deg);
        }

        .fold {
            position: absolute;
            inset: 0;
            clip-path: polygon(50% 3%, 97% 93%, 3% 93%);
            border: 4px solid var(--ink);
        }

        .fold-back {
            background: var(--chili-deep);
            transform: rotate(-10deg) scale(0.92) translate(20px, 14px);
        }

        .fold-mid {
            background: var(--chili);
            transform: rotate(7deg) scale(0.97) translate(-12px, 6px);
        }

        .fold-front {
            background: linear-gradient(160deg, #ffcf5c 0%, var(--mango) 60%, #e69500 100%);
        }

        .fold-front::before {
            content: "";
            position: absolute;
            top: 8%;
            left: 10%;
            right: 10%;
            bottom: 12%;
            border: 2.5px dashed rgba(43, 26, 15, 0.4);
            clip-path: polygon(50% 3%, 97% 93%, 3% 93%);
        }

        .sticker {
            position: absolute;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            background: var(--mint);
            color: var(--cream);
            border: 3px solid var(--ink);
            border-radius: 999px;
            padding: 0.5rem 1rem;
            font-size: 0.95rem;
            box-shadow: 3px 3px 0 var(--ink);
        }

        .sticker.hot {
            top: 6%;
            right: 2%;
            background: var(--grape);
            transform: rotate(8deg);
        }

        .sticker.fresh {
            bottom: 8%;
            left: 0%;
            transform: rotate(-6deg);
        }

        .leaf {
            position: absolute;
            width: 26px;
            height: 26px;
            background: var(--mint);
            border: 2.5px solid var(--ink);
            border-radius: 0 100% 0 100%;
        }

        .leaf:nth-child(1) {
            top: 14%;
            left: 8%;
            transform: rotate(20deg);
        }

        .leaf:nth-child(2) {
            bottom: 16%;
            right: 10%;
            transform: rotate(-30deg);
            background: var(--mango);
        }

        .steam {
            position: absolute;
            top: -10%;
            width: 3px;
            height: 60px;
            background: linear-gradient(to top, rgba(43, 26, 15, 0.35), transparent);
            border-radius: 2px;
        }

        .steam:nth-child(1) {
            left: 38%;
            animation: rise 4s ease-in-out infinite;
        }

        .steam:nth-child(2) {
            left: 50%;
            height: 80px;
            animation: rise 4s ease-in-out infinite 1s;
        }

        .steam:nth-child(3) {
            left: 62%;
            animation: rise 4s ease-in-out infinite 2s;
        }

        @keyframes rise {
            0% {
                opacity: 0;
                transform: translateY(0) rotate(0deg);
            }

            30% {
                opacity: 0.8;
            }

            100% {
                opacity: 0;
                transform: translateY(-55px) rotate(6deg);
            }
        }

        @media (prefers-reduced-motion:reduce) {
            .steam {
                animation: none !important;
                opacity: 0.2;
            }
        }

        @media (max-width:900px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 1.5rem;
            }

            h1 {
                max-width: none;
            }

            .visual {
                height: 340px;
                order: -1;
            }

            .stage {
                width: 280px;
                height: 280px;
            }

            .samosa {
                width: 170px;
                height: 170px;
            }

            .sticker {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }
        }

        /* ---------- CRAFT SPOTLIGHT ---------- */
        .craft-spotlight {
            max-width: 1240px;
            margin: 8rem auto;
            padding: 2rem 32px;
            display: grid;
            grid-template-columns: 0.8fr 1.2fr;
            align-items: center;
            gap: 5rem;
            overflow: visible;
        }

        .craft-content {
            opacity: 0;
            transform: translateY(40px);
            will-change: transform, opacity;
        }

        .spotlight-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Baloo 2', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--cream);
            background: var(--grape);
            padding: 0.4rem 0.9rem;
            border-radius: 999px;
            transform: rotate(-1.5deg);
            margin-bottom: 1.2rem;
            border: 2px solid var(--ink);
            box-shadow: 2px 2px 0 var(--ink);
        }

        .craft-content h2 {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: clamp(2.2rem, 4.2vw, 3.4rem);
            line-height: 1.05;
            letter-spacing: -0.01em;
            color: var(--ink);
            margin-bottom: 1.5rem;
        }

        .craft-content .text-highlight-mint {
            color: var(--mint);
            position: relative;
            display: inline-block;
        }

        .craft-content .text-highlight-mango {
            color: var(--mango);
            -webkit-text-stroke: 1.5px var(--ink);
            text-stroke: 1.5px var(--ink);
        }

        .craft-lead {
            font-size: 1.1rem;
            font-weight: 600;
            line-height: 1.6;
            color: #5c4630;
            margin-bottom: 2.2rem;
            max-width: 48ch;
        }

        .craft-features {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .feature-item {
            display: flex;
            gap: 1.2rem;
            align-items: flex-start;
            background: #fff;
            border: 2px solid var(--ink);
            border-radius: 16px;
            padding: 1.2rem;
            box-shadow: 4px 4px 0 var(--ink);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .feature-item:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0 var(--ink);
        }

        .feature-icon {
            font-size: 1.6rem;
            background: var(--cream);
            border: 2.5px solid var(--ink);
            border-radius: 12px;
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feature-text h4 {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--ink);
            margin-bottom: 0.15rem;
        }

        .feature-text p {
            font-size: 0.9rem;
            font-weight: 600;
            color: #5c4630;
            line-height: 1.4;
        }

        .craft-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .craft-stage {
            position: relative;
            width: 90%;
            max-width: 380px;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .craft-bg-svg {
            position: absolute;
            width: 98%;
            height: 98%;
            top: 30px;
            left: -65px;
            z-index: 1;
            opacity: 0;
            transform: scale(0.9);
            filter: drop-shadow(6px 6px 0 var(--ink));
            pointer-events: none;
            transition: opacity 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .craft-bg-svg.arrived {
            opacity: 1;
            transform: scale(1);
        }

        .craft-stage img.craft-samosa-img {
            width: 98%;
            position: absolute;
            z-index: 2;
            filter: drop-shadow(4px 8px 16px rgba(43, 26, 15, 0.12));
            pointer-events: none;
            will-change: transform;
            transform: translateX(-350px) rotate(-20deg);
        }

        @media (max-width: 900px) {
            .craft-spotlight {
                grid-template-columns: 1fr;
                gap: 4rem;
                margin: 4rem auto;
                padding: 2rem 24px;
            }

            .craft-visual {
                order: -1;
            }

            .craft-stage {
                width: 290px;
                height: 290px;
            }
        }

        /* ---------- PRODUCTS SECTION ---------- */
        .products-section {
            max-width: 1240px;
            margin: 5rem auto 8rem;
            padding: 0 32px;
        }

        .products-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .products-header .spotlight-tag {
            background: var(--chili);
            margin-bottom: 0.8rem;
        }

        .products-header h2 {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: clamp(2.2rem, 4.2vw, 3.4rem);
            line-height: 1.05;
            color: var(--ink);
            margin-bottom: 0.8rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 4rem 3rem;
            justify-items: center;
            align-items: start;
        }

        .product-card-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 340px;
        }

        .browser-warning {
            margin-bottom: 2rem;
            text-align: center;
            color: var(--chili);
            font-weight: bold;
        }

        @supports (aspect-ratio: 1 / 1) {
            .browser-warning {
                display: none;
            }
        }

        .stack {
            width: 100%;
            max-width: 340px;
            transition: 0.25s ease;
        }

        .stack:hover {
            transform: rotate(5deg);
        }

        .stack:hover .card:before {
            transform: translateY(-2%) rotate(-4deg);
        }

        .stack:hover .card:after {
            transform: translateY(2%) rotate(4deg);
        }

        .card {
            aspect-ratio: 3 / 2;
            border: 4px solid var(--ink);
            background-color: #fff;
            position: relative;
            transition: 0.15s ease;
            cursor: pointer;
            padding: 5% 5% 15% 5%;
        }

        .card:before,
        .card:after {
            content: "";
            display: block;
            position: absolute;
            height: 100%;
            width: 100%;
            border: 4px solid var(--ink);
            background-color: #fff;
            transform-origin: center center;
            z-index: -1;
            transition: 0.15s ease;
            top: 0;
            left: 0;
        }

        .card:before {
            transform: translateY(-2%) rotate(-6deg);
        }

        .card:after {
            transform: translateY(2%) rotate(6deg);
        }

        .image {
            width: 100%;
            border: 4px solid var(--ink);
            background-color: #eee;
            aspect-ratio: 1 / 1;
            position: relative;
            overflow: hidden;
        }

        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .product-meta {
            margin-top: 1.5rem;
            text-align: center;
        }

        .product-title {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--ink);
        }

        .product-desc {
            font-size: 0.9rem;
            font-weight: 600;
            color: #5c4630;
            margin-top: 0.2rem;
        }

        .product-price-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-top: 0.8rem;
        }

        .product-price {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--chili);
        }

        .product-btn {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            background: var(--ink);
            color: var(--cream);
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            border: 2px solid var(--ink);
            transition: transform 0.15s ease, background 0.15s ease;
        }

        .product-btn:hover {
            background: var(--chili);
            border-color: var(--chili);
            transform: translateY(-2px);
        }

        /* ---------- FOOTER SECTION ---------- */
        .site-footer {
            background-color: #f7ebd4;
            border-top: 4px solid var(--ink);
            padding: 5rem 2rem 2rem;
            position: relative;
            margin-top: 6rem;
        }

        .footer-hero-card {
            max-width: 1240px;
            margin: -9rem auto 5rem;
            background: linear-gradient(135deg, #ffb703 0%, #ef4d2a 100%);
            border: 4px solid var(--ink);
            border-radius: 32px;
            box-shadow: 8px 8px 0 var(--ink);
            padding: 3rem 4rem;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            align-items: center;
            gap: 3rem;
            position: relative;
            overflow: hidden;
        }

        .footer-hero-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.25) 2px, transparent 2px);
            background-size: 20px 20px;
            pointer-events: none;
        }

        .footer-tag {
            background: var(--ink) !important;
            color: var(--cream) !important;
            margin-bottom: 1rem;
        }

        .footer-hero-content h2 {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: clamp(2rem, 3.8vw, 3.2rem);
            line-height: 1.1;
            color: var(--cream);
            text-shadow: 2px 2px 0 var(--ink);
            margin-bottom: 1rem;
        }

        .footer-hero-content h2 .text-highlight-mango {
            color: #fff7e6;
            -webkit-text-stroke: 1.5px var(--ink);
            text-stroke: 1.5px var(--ink);
        }

        .footer-lead {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--cream);
            text-shadow: 1px 1px 0 rgba(43, 26, 15, 0.5);
            margin-bottom: 2rem;
            max-width: 44ch;
            line-height: 1.5;
        }

        .footer-actions {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            flex-wrap: wrap;
        }

        .footer-hero-image-wrapper {
            display: flex;
            justify-content: center;
            position: relative;
        }

        .footer-img-frame {
            position: relative;
            width: 100%;
            max-width: 380px;
            aspect-ratio: 1;
            border: 4px solid var(--ink);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 6px 6px 0 var(--ink);
            background: #fff;
            transform: rotate(3deg);
            transition: transform 0.3s ease;
        }

        .footer-img-frame:hover {
            transform: rotate(0deg) scale(1.02);
        }

        .footer-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .footer-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 2;
        }

        .footer-main {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
            gap: 3rem;
            padding-bottom: 4rem;
        }

        .footer-slogan {
            font-size: 0.95rem;
            font-weight: 600;
            color: #5c4630;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            max-width: 32ch;
            line-height: 1.5;
        }

        .social-links {
            display: flex;
            gap: 0.8rem;
        }

        .social-icon {
            width: 42px;
            height: 42px;
            border: 2px solid var(--ink);
            border-radius: 50%;
            background: var(--cream);
            color: var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 0 var(--ink);
            transition: transform 0.15s ease, background 0.15s ease, color 0.15s ease;
        }

        .social-icon:hover {
            background: var(--chili);
            color: var(--cream);
            transform: translateY(-3px);
        }

        .footer-heading {
            font-family: 'Baloo 2', sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--ink);
            margin-bottom: 1.2rem;
            position: relative;
            display: inline-block;
        }

        .footer-links,
        .footer-info {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .footer-links a {
            color: #5c4630;
            transition: color 0.15s ease, transform 0.15s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--chili);
            transform: translateX(4px);
        }

        .footer-info li {
            color: #5c4630;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            background-color: var(--mint);
            border-radius: 50%;
            display: inline-block;
            border: 1.5px solid var(--ink);
            box-shadow: 0 0 6px var(--mint);
        }

        .newsletter-text {
            font-size: 0.9rem;
            font-weight: 600;
            color: #5c4630;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .newsletter-form {
            display: flex;
            gap: 0.5rem;
        }

        .newsletter-input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 2px solid var(--ink);
            border-radius: 999px;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 600;
            background: #fff;
            color: var(--ink);
            outline: none;
        }

        .newsletter-input:focus {
            border-color: var(--chili);
            box-shadow: 0 0 0 3px rgba(239, 77, 42, 0.2);
        }

        .newsletter-btn {
            font-family: 'Baloo 2', sans-serif;
            font-weight: 800;
            font-size: 0.95rem;
            padding: 0.7rem 1.4rem;
            background: var(--chili);
            color: var(--cream);
            border: 2px solid var(--ink);
            border-radius: 999px;
            box-shadow: 2px 2px 0 var(--ink);
            cursor: pointer;
            transition: transform 0.15s ease, background 0.15s ease;
        }

        .newsletter-btn:hover {
            background: var(--ink);
            transform: translateY(-2px);
        }

        .footer-bottom {
            max-width: 1240px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 2px dashed rgba(43, 26, 15, 0.25);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: #5c4630;
        }

        .footer-bottom-links {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .footer-bottom-links a {
            color: #5c4630;
            transition: color 0.15s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--chili);
        }

        @media (max-width: 992px) {
            .footer-hero-card {
                grid-template-columns: 1fr;
                padding: 2.5rem 2rem;
                margin-top: -6rem;
                text-align: center;
            }

            .footer-lead {
                margin-left: auto;
                margin-right: auto;
            }

            .footer-actions {
                justify-content: center;
            }

            .footer-main {
                grid-template-columns: 1fr 1fr;
                gap: 2.5rem;
            }
        }

        @media (max-width: 600px) {
            .footer-main {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="wordmark">
            <img src="{{ asset('mainlogo.png') }}" alt="SamosaWala Logo">
        </div>
        <div class="nav-links">
            <a href="#products">Products</a>
            <a href="#">Locations</a>
            <a href="#">Our Story</a>
        </div>
        <div class="nav-right-actions">
            <button id="cart-btn" class="nav-cart-btn" aria-label="View Samosa Cart" onclick="toggleCartSidebar(true)">
                <div class="cart-icon-wrapper">
                    <svg class="samosa-cart-svg" viewBox="0 0 36 36" width="28" height="28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 4L4 28C3.3 29.2 4.1 31 5.5 31H30.5C31.9 31 32.7 29.2 32 28L18 4Z" fill="#FFB703"
                            stroke="#2B1A0F" stroke-width="2.5" stroke-linejoin="round" />
                        <path d="M18 9L8 26.5H28L18 9Z" fill="#FFD05B" stroke="#EF4D2A" stroke-width="1.5"
                            stroke-linejoin="round" />
                        <path d="M13 22C16 20.5 20 20.5 23 22" stroke="#2B1A0F" stroke-width="2"
                            stroke-linecap="round" />
                        <path d="M15 2.5C14.5 1.5 15.5 0.5 15 0" stroke="#EF4D2A" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M21 2.5C20.5 1.5 21.5 0.5 21 0" stroke="#EF4D2A" stroke-width="1.5"
                            stroke-linecap="round" />
                    </svg>
                </div>
                <span class="cart-label">Cart</span>
                <span class="cart-count-badge" id="cart-count-badge">0</span>
            </button>
            <a class="nav-order" href="#" onclick="toggleCartSidebar(true); return false;">Order ahead</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <span class="badge">FRESH OFF THE CART</span>
            <h1>Grab it <span class="hl">hot.</span><br>Eat it <span class="hl2">now.</span></h1>
            <p class="lead">Potatoes, peas, and a spice mix nobody's getting out of us — folded by hand and dropped
                straight into hot oil the second you order.</p>
            <div class="cta-row">
                <a class="btn-primary" href="#">Find a cart near you</a>
                <a class="btn-secondary" href="#">See the menu →</a>
            </div>
            <div class="stat-strip">
                <div>
                    <span class="stat-num">6</span>
                    <span class="stat-label">carts around town</span>
                </div>
                <div>
                    <span class="stat-num">100%</span>
                    <span class="stat-label">folded fresh, zero freezer</span>
                </div>
                <div>
                    <span class="stat-num">4</span>
                    <span class="stat-label">chutneys made same-day</span>
                </div>
            </div>
        </div>

        <div class="visual">
            <div class="stage">
                <img src="{{ asset('heroimage.png') }}" alt="Hero Image">
            </div>

        </div>
    </section>
    <!-- ---------- PRODUCTS SECTION ---------- -->
    <section class="products-section" id="products">
        <p class="browser-warning">
            If this looks wonky to you it's because this browser doesn't support the CSS property 'aspect-ratio'.
        </p>

        <div class="products-header">
            <span class="spotlight-tag">Fresh Off The Fryer</span>
            <h2>Our Hot & Spiced <span class="text-highlight-mango">Products</span></h2>
            <p>Every single samosa is folded by hand and fried to golden perfection.</p>
        </div>

        <div class="products-grid">
            @foreach ($product as $produc)
                <div class="product-card-wrapper">
                    <div class="stack">
                        <div class="card" onclick="addToCart({{ $produc['id'] }})">
                            <div class="image">
                                <img src="{{ asset($produc['image']) }}" alt="{{ $produc['title'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="product-meta">
                        <h3 class="product-title">{{ $produc['title'] }}</h3>
                        <p class="product-desc">{{ $produc['desc'] }}</p>
                        <div class="product-price-row">
                            <span class="product-price">{{ $produc['price'] }}</span>
                            <button type="button" onclick="addToCart({{ $produc['id'] }})" class="product-btn">Order Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>



    <section class="craft-spotlight">
        <div class="craft-visual">
            <div class="craft-stage">
                <!-- Samosa shaped background SVG -->
                <svg viewBox="0 0 100 100" class="craft-bg-svg" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 28 4 
                             C 45 8, 76 45, 86 73 
                             C 84 82, 55 94, 29 94 
                             C 25 80, 27 35, 28 4 Z" fill="var(--mint)" stroke="var(--ink)" stroke-width="4"
                        stroke-linejoin="round" />
                </svg>
                <img src="{{ asset('samosa2.png') }}" alt="Crispy handmade samosa close-up" class="craft-samosa-img">
            </div>
        </div>
        <div class="craft-content">
            <span class="spotlight-tag">The Art of the Fold</span>
            <h2>Hand-folded with <span class="text-highlight-mint">precision</span>, fried to <span
                    class="text-highlight-mango">perfection.</span></h2>
            <p class="craft-lead">
                Every single samosa starts its life as a fresh sheet of dough.
                No machines, no uniform molds. Just decades-old folding techniques,
                a perfectly spiced potato-and-pea filling, and oil hot enough to lock in the crunch.
            </p>
            <div class="craft-features">
                <div class="feature-item">
                    <span class="feature-icon">👐</span>
                    <div class="feature-text">
                        <h4>Handmade Only</h4>
                        <p>Every fold is unique. No two samosas are exactly alike.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <span class="feature-icon">🥔</span>
                    <div class="feature-text">
                        <h4>Local Ingredients</h4>
                        <p>Potatoes and spices sourced fresh every morning.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- ---------- FOOTER SECTION ---------- -->
    <footer class="site-footer">
        <div class="footer-hero-card">
            <div class="footer-hero-content">
                <span class="spotlight-tag footer-tag">🇮🇳 Authentic Taste of India</span>
                <h2>Crispy, Golden & <span class="text-highlight-mango">Unforgettable</span></h2>
                <p class="footer-lead">
                    Experience the national cuisine crafted with passion. Hand-folded daily using traditional spices,
                    served steaming hot just the way you love it.
                </p>
                <div class="footer-actions">
                    <a href="#products" class="btn-primary">Explore Our Menu</a>
                    <a href="#" class="btn-secondary">Find Nearby Cart →</a>
                </div>
            </div>
            <div class="footer-hero-image-wrapper">
                <div class="footer-img-frame">
                    <img src="{{ asset('footer.jpg') }}" alt="National Cuisine India - Handcrafted Samosas"
                        class="footer-img">
                    <div class="sticker hot footer-badge">100% Fresh</div>
                </div>
            </div>
        </div>

        <div class="footer-main">
            <div class="footer-brand">
                <div class="wordmark">
                    <img src="{{ asset('mainlogo.png') }}" alt="SamosaWala Logo">
                </div>
                <p class="footer-slogan">
                    Fresh off the fryer, folded by hand with authentic Indian spices. Grab it hot, eat it now!
                </p>
                <div class="social-links">
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.5 5H18V0h-3.808C10.592 0 9 1.583 9 4.615V8z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon" aria-label="Twitter">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon" aria-label="WhatsApp">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.572-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#products">Our Menu & Products</a></li>
                    <li><a href="#">Cart Locations</a></li>
                    <li><a href="#">The Art of Folding</a></li>
                    <li><a href="#">Catering Services</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Opening Hours</h4>
                <ul class="footer-info">
                    <li><strong>Mon - Fri:</strong> 10:00 AM - 10:00 PM</li>
                    <li><strong>Sat - Sun:</strong> 09:00 AM - 11:00 PM</li>
                    <li><span class="status-dot"></span> Fresh batch every 30 mins</li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-heading">Join Samosa Club</h4>
                <p class="newsletter-text">Subscribe for exclusive secret menu releases & free chutney offers!</p>
                <form class="newsletter-form"
                    onsubmit="event.preventDefault(); alert('Thank you for joining the Samosa Club!');">
                    <input type="email" placeholder="Enter your email" required class="newsletter-input">
                    <button type="submit" class="newsletter-btn">Join</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">© 2026 <strong>SamosaWala</strong>. Hand-folded with ❤️ & spices. All rights reserved.
            </p>
            <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <span>•</span>
                <a href="#">Terms of Service</a>
                <span>•</span>
                <a href="#">Allergen Guide</a>
            </div>
        </div>
        <!-- ---------- CART BACKDROP & SIDEBAR ---------- -->
        <div id="cart-backdrop" class="cart-backdrop" onclick="toggleCartSidebar(false)"></div>
        <aside id="cart-sidebar" class="cart-sidebar">
            <div class="sidebar-header">
                <div class="sidebar-title">
                    <svg viewBox="0 0 36 36" width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 4L4 28C3.3 29.2 4.1 31 5.5 31H30.5C31.9 31 32.7 29.2 32 28L18 4Z" fill="#FFB703"
                            stroke="#2B1A0F" stroke-width="2.5" stroke-linejoin="round" />
                        <path d="M18 9L8 26.5H28L18 9Z" fill="#FFD05B" stroke="#EF4D2A" stroke-width="1.5"
                            stroke-linejoin="round" />
                        <path d="M13 22C16 20.5 20 20.5 23 22" stroke="#2B1A0F" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    <span>Cart & Orders</span>
                </div>
                <button class="sidebar-close-btn" onclick="toggleCartSidebar(false)"
                    aria-label="Close Sidebar">✕</button>
            </div>

            <div class="sidebar-tabs">
                <button id="tab-btn-cart" class="sidebar-tab active" onclick="switchSidebarTab('cart')">
                    🛒 Your Cart <span id="tab-cart-badge" class="sidebar-tab-badge">0</span>
                </button>
                <button id="tab-btn-orders" class="sidebar-tab" onclick="switchSidebarTab('orders')">
                    🔥 Active Orders <span id="tab-orders-badge" class="sidebar-tab-badge"
                        style="display:none;">0</span>
                </button>
            </div>

            <div class="sidebar-content">
                <!-- TAB 1: CART PANEL -->
                <div id="panel-cart" class="tab-panel active">
                    <div class="order-method-box">
                        <button class="method-option selected" onclick="setOrderMethod(this, 'pickup')">🛍️ Pickup at
                            Cart</button>
                        <button class="method-option" onclick="setOrderMethod(this, 'delivery')">🛵 Delivery</button>
                    </div>

                    <div id="cart-items-container" class="cart-items-list">
                        <!-- Dynamic cart items rendered by JS -->
                    </div>
                </div>

                <!-- TAB 2: ACTIVE ORDERS PANEL -->
                <div id="panel-orders" class="tab-panel">
                    <div id="orders-container">
                        <!-- Dynamic active orders rendered by JS -->
                    </div>
                </div>
            </div>

            <div id="cart-sidebar-footer" class="sidebar-footer">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span id="cart-subtotal">$0.00</span>
                </div>
                <div class="summary-row">
                    <span>Taxes & Fees</span>
                    <span id="cart-tax">$0.00</span>
                </div>
                <div class="summary-row total-row">
                    <span>Total</span>
                    <span id="cart-total">$0.00</span>
                </div>
                <button class="checkout-btn" onclick="placeOrder()">
                    <span>Place Samosa Order</span> ➔
                </button>
            </div>
        </aside>

        <script>
            // ---------- PRODUCTS CATALOG DATA ----------
            const productsCatalog = {
                1: {
                    id: 1,
                    title: "Classic Potato Samosa",
                    price: 2.99,
                    image: "{{ asset('product1.jpeg') }}",
                    desc: "Golden crisp crust stuffed with seasoned potato & green pea filling."
                },
                2: {
                    id: 2,
                    title: "Crispy Mini Samosas",
                    price: 4.49,
                    image: "{{ asset('product2.jpeg') }}",
                    desc: "Bite-sized crunch packed with signature spices and fresh herbs."
                },
                3: {
                    id: 3,
                    title: "Special Onion Samosa",
                    price: 5.99,
                    image: "{{ asset('product3.jpeg') }}",
                    desc: "Served hot with fresh sliced red onions & signature chutney."
                }
            };

            // ---------- CART & ORDERS STATE ----------
            let samosaCart = JSON.parse(localStorage.getItem('samosa_cart_items') || '[]');
            let samosaOrders = JSON.parse(localStorage.getItem('samosa_placed_orders') || '[]');
            let currentOrderMethod = 'pickup';

            function toggleCartSidebar(show) {
                const sidebar = document.getElementById('cart-sidebar');
                const backdrop = document.getElementById('cart-backdrop');
                if (!sidebar || !backdrop) return;
                if (show) {
                    sidebar.classList.add('open');
                    backdrop.classList.add('active');
                    document.body.style.overflow = 'hidden';
                } else {
                    sidebar.classList.remove('open');
                    backdrop.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }

            function switchSidebarTab(tab) {
                const cartBtn = document.getElementById('tab-btn-cart');
                const ordersBtn = document.getElementById('tab-btn-orders');
                const cartPanel = document.getElementById('panel-cart');
                const ordersPanel = document.getElementById('panel-orders');
                const footer = document.getElementById('cart-sidebar-footer');

                if (tab === 'cart') {
                    cartBtn.classList.add('active');
                    ordersBtn.classList.remove('active');
                    cartPanel.classList.add('active');
                    ordersPanel.classList.remove('active');
                    footer.style.display = 'flex';
                } else {
                    ordersBtn.classList.add('active');
                    cartBtn.classList.remove('active');
                    ordersPanel.classList.add('active');
                    cartPanel.classList.remove('active');
                    footer.style.display = 'none';
                }
            }

            function setOrderMethod(btnEl, method) {
                document.querySelectorAll('.method-option').forEach(el => el.classList.remove('selected'));
                btnEl.classList.add('selected');
                currentOrderMethod = method;
                updateCartUI();
            }

            function addToCart(productId) {
                const product = productsCatalog[productId];
                if (!product) return;

                const existingIndex = samosaCart.findIndex(item => item.id === productId);
                if (existingIndex > -1) {
                    samosaCart[existingIndex].qty += 1;
                } else {
                    samosaCart.push({
                        id: product.id,
                        title: product.title,
                        price: product.price,
                        image: product.image,
                        qty: 1
                    });
                }

                saveCartState();
                updateCartUI();
                animateCartBtn();
                toggleCartSidebar(true);
            }

            function updateCartQty(productId, delta) {
                const index = samosaCart.findIndex(item => item.id === productId);
                if (index > -1) {
                    samosaCart[index].qty += delta;
                    if (samosaCart[index].qty <= 0) {
                        samosaCart.splice(index, 1);
                    }
                }
                saveCartState();
                updateCartUI();
            }

            function removeFromCart(productId) {
                samosaCart = samosaCart.filter(item => item.id !== productId);
                saveCartState();
                updateCartUI();
            }

            function saveCartState() {
                localStorage.setItem('samosa_cart_items', JSON.stringify(samosaCart));
            }

            function animateCartBtn() {
                const btn = document.getElementById('cart-btn');
                if (!btn) return;
                btn.classList.remove('cart-bounce');
                void btn.offsetWidth;
                btn.classList.add('cart-bounce');
            }

            function updateCartUI() {
                const totalCount = samosaCart.reduce((sum, item) => sum + item.qty, 0);
                const countBadge = document.getElementById('cart-count-badge');
                const tabCartBadge = document.getElementById('tab-cart-badge');
                const cartItemsContainer = document.getElementById('cart-items-container');
                const checkoutBtn = document.querySelector('.checkout-btn');

                if (countBadge) countBadge.textContent = totalCount;
                if (tabCartBadge) tabCartBadge.textContent = totalCount;

                if (samosaCart.length === 0) {
                    if (cartItemsContainer) {
                        cartItemsContainer.innerHTML = `
                        <div class="cart-empty-state">
                            <div class="cart-empty-icon">
                                <svg viewBox="0 0 36 36" width="55" height="55" fill="none">
                                    <path d="M18 4L4 28C3.3 29.2 4.1 31 5.5 31H30.5C31.9 31 32.7 29.2 32 28L18 4Z" fill="#FFF7E6" stroke="#2B1A0F" stroke-width="2.5"/>
                                    <path d="M13 22C16 20.5 20 20.5 23 22" stroke="#2B1A0F" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <h3>Your cart is empty!</h3>
                            <p>No samosas in sight. Add some crispy golden hot samosas to get started!</p>
                            <a href="#products" class="btn-primary" style="font-size:0.95rem; padding:0.6rem 1.4rem;" onclick="toggleCartSidebar(false)">Explore Menu</a>
                        </div>
                    `;
                    }
                    if (checkoutBtn) checkoutBtn.disabled = true;
                    document.getElementById('cart-subtotal').textContent = '$0.00';
                    document.getElementById('cart-tax').textContent = '$0.00';
                    document.getElementById('cart-total').textContent = '$0.00';
                    return;
                }

                if (checkoutBtn) checkoutBtn.disabled = false;

                let subtotal = 0;
                let itemsHTML = '';

                samosaCart.forEach(item => {
                    const itemTotal = item.price * item.qty;
                    subtotal += itemTotal;
                    itemsHTML += `
                    <div class="cart-item-card">
                        <img src="${item.image}" alt="${item.title}" class="cart-item-img">
                        <div class="cart-item-info">
                            <div class="cart-item-title">${item.title}</div>
                            <div class="cart-item-price">$${item.price.toFixed(2)} each</div>
                            <div class="cart-qty-controls">
                                <button class="qty-btn" onclick="updateCartQty(${item.id}, -1)">-</button>
                                <span class="qty-num">${item.qty}</span>
                                <button class="qty-btn" onclick="updateCartQty(${item.id}, 1)">+</button>
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <div class="cart-item-total">$${itemTotal.toFixed(2)}</div>
                            <button class="remove-item-btn" onclick="removeFromCart(${item.id})">Remove</button>
                        </div>
                    </div>
                `;
                });

                if (cartItemsContainer) cartItemsContainer.innerHTML = itemsHTML;

                const tax = subtotal * 0.05;
                const deliveryFee = (currentOrderMethod === 'delivery' && subtotal > 0) ? 2.50 : 0.00;
                const total = subtotal + tax + deliveryFee;

                document.getElementById('cart-subtotal').textContent = `$${subtotal.toFixed(2)}`;
                document.getElementById('cart-tax').textContent = `$${(tax + deliveryFee).toFixed(2)}${currentOrderMethod === 'delivery' ? ' (incl. $2.50 delivery)' : ''}`;
                document.getElementById('cart-total').textContent = `$${total.toFixed(2)}`;
            }

            function placeOrder() {
                if (samosaCart.length === 0) return;

                const subtotal = samosaCart.reduce((sum, i) => sum + i.price * i.qty, 0);
                const tax = subtotal * 0.05;
                const deliveryFee = currentOrderMethod === 'delivery' ? 2.50 : 0;
                const total = subtotal + tax + deliveryFee;

                const newOrder = {
                    id: 'SM-' + Math.floor(1000 + Math.random() * 9000),
                    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                    items: [...samosaCart],
                    total: total.toFixed(2),
                    method: currentOrderMethod === 'delivery' ? '🛵 Delivery' : '🛍️ Pickup',
                    step: 1
                };

                samosaOrders.unshift(newOrder);
                localStorage.setItem('samosa_placed_orders', JSON.stringify(samosaOrders));

                samosaCart = [];
                saveCartState();
                updateCartUI();

                renderOrdersUI();
                switchSidebarTab('orders');

                setTimeout(() => {
                    newOrder.step = 2;
                    localStorage.setItem('samosa_placed_orders', JSON.stringify(samosaOrders));
                    renderOrdersUI();
                }, 8000);

                setTimeout(() => {
                    newOrder.step = 3;
                    localStorage.setItem('samosa_placed_orders', JSON.stringify(samosaOrders));
                    renderOrdersUI();
                }, 18000);
            }

            function renderOrdersUI() {
                const container = document.getElementById('orders-container');
                const tabOrdersBadge = document.getElementById('tab-orders-badge');

                if (tabOrdersBadge) {
                    if (samosaOrders.length > 0) {
                        tabOrdersBadge.textContent = samosaOrders.length;
                        tabOrdersBadge.style.display = 'inline';
                    } else {
                        tabOrdersBadge.style.display = 'none';
                    }
                }

                if (!container) return;

                if (samosaOrders.length === 0) {
                    container.innerHTML = `
                    <div class="cart-empty-state">
                        <div class="cart-empty-icon" style="background:var(--mint);">
                            <span style="font-size:2.5rem;">📜</span>
                        </div>
                        <h3>No Active Orders</h3>
                        <p>Place an order from your cart to see live tracking here!</p>
                    </div>
                `;
                    return;
                }

                let ordersHTML = '';
                samosaOrders.forEach(order => {
                    const isStep1 = order.step >= 1;
                    const isStep2 = order.step >= 2;
                    const isStep3 = order.step >= 3;

                    ordersHTML += `
                    <div class="order-card">
                        <div class="order-card-header">
                            <div>
                                <span class="order-id">Order #${order.id}</span>
                                <div style="font-size:0.8rem; color:#7a634e; font-weight:600;">${order.time} • ${order.method}</div>
                            </div>
                            <span class="order-status-badge">${isStep3 ? '🎉 Ready / Out' : '🔥 Cooking'}</span>
                        </div>
                        <div style="font-size:0.9rem; font-weight:700; color:var(--ink);">
                            Items: ${order.items.map(i => `${i.qty}x ${i.title}`).join(', ')}
                        </div>
                        <div class="tracker-steps">
                            <div class="tracker-step ${isStep1 ? (isStep2 ? 'completed' : 'active') : ''}">
                                1. Order Received & Dough Hand-Folded 🥟
                            </div>
                            <div class="tracker-step ${isStep2 ? (isStep3 ? 'completed' : 'active') : ''}">
                                2. Dropped in Hot Oil & Fried Golden 🍳
                            </div>
                            <div class="tracker-step ${isStep3 ? 'active completed' : ''}">
                                3. Hot, Packed & Ready to Eat! 🛵
                            </div>
                        </div>
                        <div style="text-align:right; font-family:'Baloo 2', sans-serif; font-size:1.1rem; font-weight:800; color:var(--chili); border-top:1.5px dashed rgba(43,26,15,0.15); padding-top:0.4rem;">
                            Total: $${order.total}
                        </div>
                    </div>
                `;
                });

                container.innerHTML = ordersHTML;
            }

            document.addEventListener('DOMContentLoaded', () => {
                const target = document.querySelector('.craft-spotlight');
                const samosa = document.querySelector('.craft-samosa-img');
                const bgSvg = document.querySelector('.craft-bg-svg');
                const content = document.querySelector('.craft-content');

                if (target) {
                    let ticking = false;

                    function updateAnimation() {
                        const rect = target.getBoundingClientRect();
                        const windowHeight = window.innerHeight;
                        const start = windowHeight;
                        const end = (windowHeight - rect.height) / 2;

                        let progress = (windowHeight - rect.top) / (start - end);
                        progress = Math.max(0, Math.min(1, progress));

                        if (samosa) {
                            const tx = -350 * (1 - progress);
                            const rot = -25 * (1 - progress) + 5;
                            samosa.style.transform = `translateX(${tx}px) rotate(${rot}deg)`;
                        }

                        if (bgSvg) {
                            if (progress >= 0.95) {
                                bgSvg.classList.add('arrived');
                            } else {
                                bgSvg.classList.remove('arrived');
                            }
                        }

                        if (content) {
                            content.style.opacity = progress;
                            content.style.transform = `translateY(${(1 - progress) * 40}px)`;
                        }

                        ticking = false;
                    }

                    function requestTick() {
                        if (!ticking) {
                            requestAnimationFrame(updateAnimation);
                            ticking = true;
                        }
                    }

                    window.addEventListener('scroll', requestTick, { passive: true });
                    window.addEventListener('resize', requestTick);
                    updateAnimation();
                }

                updateCartUI();
                renderOrdersUI();
            });
        </script>
</body>

</html>