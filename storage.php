<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browser Storage Lab (Local vs Session)</title>
    <style>
        body { font-family: sans-serif; margin: 30px; line-height: 1.6; }
        .box { border: 2px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 8px; }
        button { padding: 8px 12px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Local Storage vs Session Storage Hands-On Lab</h2>

    <div class="box">
        <h3>1. Local Storage (Permanent Across Tabs)</h3>
        <p>Saved Username: <strong id="local-user-display">None</strong></p>
        <input type="text" id="username-input" placeholder="Enter name...">
        <button onclick="saveToLocalStorage()">Save to Local Storage</button>
        <button onclick="clearLocalStorage()">Clear Local Storage</button>
    </div>

    <!-- Session Storage Box -->
    <div class="box">
        <h3>2. Session Storage (Single Tab Lifetime)</h3>
        <p>Current Tab Form Step: <strong id="session-step-display">1</strong></p>
        <button onclick="nextStep()">Increment Form Step (+1)</button>
        <button onclick="clearSessionStorage()">Clear Session Storage</button>
    </div>
<script>

        function saveToLocalStorage() {
            const name = document.getElementById('username-input').value;
            if(name) {
                // Key-Value pair save karna
                localStorage.setItem('saved_username', name);
                updateUI();
            }
        }

        function clearLocalStorage() {
            localStorage.removeItem('saved_username');
            updateUI();
        }

]        function nextStep() {
            let currentStep = parseInt(sessionStorage.getItem('wizard_step') || '1');
            currentStep += 1;
            sessionStorage.setItem('wizard_step', currentStep.toString());
            updateUI();
        }

        function clearSessionStorage() {
            sessionStorage.removeItem('wizard_step');
            updateUI();
        }

        function updateUI() {

            // Local Storage Read
            const localUser = localStorage.getItem('saved_username');
            document.getElementById('local-user-display').innerText = localUser ? localUser : 'None';

            // Session Storage Read 
            const sessionStep = sessionStorage.getItem('wizard_step');
            document.getElementById('session-step-display').innerText = sessionStep ? sessionStep : '1';
        }

        // page load hone par values sync karein
        updateUI();
    </script>
</body>
</html>