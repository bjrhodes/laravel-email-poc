# Laravel Template Leaking

## Purpose

I recently experienced an odd issue on a client project which I wanted to replicate in a minimal fashion to prove the cause. This repo is the smallest replication I could create.

## Problem

If Laravel renders a secondary template whilst already rendering a primary template, the sections can collide, resulting in data intended for one template "leaking" into a different template.

This example is very silly and not best-practice at all, but gives a neat illustration of the issue, as the template intended for the email view is also dropped into the browser.

## Real world impact

Whilst this demonstration is easy to reason about and should never happen in a well designed application, the original issue appeared in a much more oblique manner. A ViewComposer in a larger application triggered an error, which itself triggered an admin notification. That admin notification then triggered an email to be sent and the web-view was sent via email instead of the email-view.

For anyone else experiencing this issue, the immediately obvious fix(es) could be:

-   Rename the section. Nice and easy, just prefix all sections with some string.
-   Don't send emails inline. Instead always push to a queue and send later.

Although I'm sure there are others.
