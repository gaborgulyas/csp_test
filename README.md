Code for testing Content Security Policy implementations.

Consists of a simple backend/frontend, which tries to load an image from an external source. However, a CSP constraint is also given, making the loading process fail, and invoking an error report. All events are logged in a local file (`csp.log`).

I used this code to measure how different browsers implement CSP.
