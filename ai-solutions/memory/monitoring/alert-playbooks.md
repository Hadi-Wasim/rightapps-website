# SEO Alert Response Playbooks
**Company:** Rightway Systems (rightapps.net)  
**Maintained by:** info@rightapps.net  
**Version:** 1.0 · April 2025  

> **Philosophy:** Stay calm. Every ranking drop has a cause. Find the cause, fix it, monitor recovery. Document everything.

---

## Table of Contents
1. [Ranking Drop Playbook](#1-ranking-drop-playbook)
2. [Traffic Drop Playbook](#2-traffic-drop-playbook)
3. [Crawl Error Playbook](#3-crawl-error-playbook)
4. [ZATCA Keyword Loss Playbook](#4-zatca-keyword-loss-playbook)
5. [404 Error Spike Playbook](#5-404-error-spike-playbook)
6. [CTR Drop Playbook](#6-ctr-drop-playbook)
7. [Competitor Surge Playbook](#7-competitor-surge-playbook)
8. [Core Web Vitals Degradation Playbook](#8-core-web-vitals-degradation-playbook)
9. [Page 2 Opportunity Playbook](#9-page-2-opportunity-playbook)
10. [Escalation Matrix](#escalation-matrix)

---

## 1. Ranking Drop Playbook

**Triggered by:** RANK-001, RANK-002, RANK-003, RANK-006  
**Severity:** URGENT / WARNING  
**Resolution target:** Identify root cause within 24 h; implement fix within 72 h

### Step 1 — Is the Page Still Indexed? (5 min)
```
Search Google: site:rightapps.net/[target-page-url]
```
- ✅ Page appears → go to Step 2  
- ❌ Page NOT found → treat as de-indexation emergency (see TECH-005 / TECH-006)

### Step 2 — Check for Algorithm Update (10 min)
- Visit: https://developers.google.com/search/updates/ranking  
- Check: https://moz.com/google-algorithm-change  
- Check: https://www.seroundtable.com  
- Did a confirmed update roll out in the last 7 days?
  - **Yes → this is likely algo-related.** Wait 2–3 weeks for stabilisation before making content changes.
  - **No → continue investigation below.**

### Step 3 — Check the SERP Directly (10 min)
- Google the keyword manually (use incognito / different browser)
- Questions to answer:
  - Did a competitor move up? Which one?
  - Did a new domain appear (news site, directory, govt page)?
  - Did Google add a new SERP feature (featured snippet, AI Overview) that pushed results down?
  - Has the search intent shifted? (e.g., now showing product pages vs. service pages)

### Step 4 — Check for On-Site Changes (10 min)
- Was the page edited, rewritten, or republished recently?
- Were any internal links to this page removed?
- Was the page title or H1 changed?
- Check: did a recent site deployment break anything?

### Step 5 — Check Google Search Console (15 min)
- **Performance report:** Filter by page → look at impressions, CTR, average position over past 28 days
- **Coverage report:** Any new errors on this URL?
- **Core Web Vitals:** Any new "Poor" signals for this page?

### Step 6 — Analyse the #1 Ranking Competitor Page
- What word count do they have vs. yours?
- Do they have schema markup you don't?
- Do they have more specific content (case studies, specs, pricing info)?
- Do they have more backlinks or higher domain authority?

### Likely Causes Quick Reference
| Symptom | Most Likely Cause |
|---|---|
| Sudden drop overnight | Algorithm update OR manual action |
| Gradual drop over 2–4 weeks | Competitor content improved |
| Drop after site edit | On-page change broke relevance |
| Drop after deployment | Technical issue (noindex, URL change, broken link) |
| Drop on one page only | Page-specific quality issue |
| Drop across all pages | Algorithm update or crawl issue |

### Response Actions
1. Document: keyword, old position, new position, date, SERP screenshot
2. If algo update: **wait and monitor** — do not make panic changes
3. If competitor overtake: **strengthen your content** (add depth, FAQ, schema)
4. If technical: **fix immediately** (noindex, 404, redirect loop)
5. If page edit caused drop: **revert to previous version** if possible

### Escalation
- 0–24 h: Try to identify cause (solo)
- 24–48 h: No cause found → engage web developer to check technical side
- 7 days: No recovery → conduct full competitive content gap analysis

---

## 2. Traffic Drop Playbook

**Triggered by:** TRAF-001, TRAF-002, TRAF-003, TRAF-005  
**Severity:** URGENT / WARNING  
**Resolution target:** Diagnose within 24 h

### Step 1 — Check Google Search Console Performance (10 min)
- GSC → Performance → Last 28 days vs previous 28 days
- Filter by:
  - **Page:** Which pages lost the most clicks?
  - **Query:** Which keywords lost impressions?
  - **Country:** Is it specific to Pakistan / Saudi Arabia / UAE?
  - **Device:** Mobile only? Desktop only?

### Step 2 — Is It a GSC Data Anomaly? (5 min)
- GSC sometimes has 2–3 day data lag. Confirm the drop is real by checking traffic for 3+ days, not just 1.

### Step 3 — Check Index Coverage
- GSC → Coverage → look for new "Error" or "Excluded" pages
- Sudden jump in "Crawled - currently not indexed" = Google quality signal problem

### Step 4 — Check Site Speed
- Google PageSpeed Insights: https://pagespeed.web.dev/ for top 3 pages
- A speed degradation after a hosting change or plugin update can cause traffic loss

### Step 5 — Check for 404s on Top Pages
- GSC → Coverage → "Not Found (404)" tab
- Sort by most impressions lost

### Step 6 — Check Algorithm Timeline
- Same as Ranking Drop Playbook Step 2

### Step 7 — Check Competitor Traffic (free estimate)
- Search core keywords in incognito — have competitors' pages improved?
- Has a new, high-authority page entered the SERP (e.g., news article, govt page, industry portal)?

### Likely Causes
| Traffic Source | First Thing to Check |
|---|---|
| All organic | Algorithm update |
| Specific country drop | Geo-targeting issue or local SERP change |
| Mobile only | Mobile usability error, CWV failure on mobile |
| Specific pages | Page-level error, de-indexation, competitor |
| All pages, all devices | Robots.txt block, sitemap error, manual action |

### Response Actions
1. Identify top 5 pages with biggest click loss
2. For each: check if still indexed, check for crawl errors
3. If impressions also dropped → indexing or crawl issue (not just ranking)
4. If impressions stable but clicks dropped → CTR problem (see Playbook 6)
5. Document findings in `rank-history/` folder with date

---

## 3. Crawl Error Playbook

**Triggered by:** TECH-002, TECH-003, TECH-005  
**Severity:** WARNING  
**Resolution target:** Fix within 48 h

### Step 1 — Identify the Error Type
- GSC → Coverage report
- Types: Server error (5xx) · Not found (404) · Redirect error · Blocked by robots.txt · Blocked by noindex

### Step 2 — Check robots.txt
```
Visit: https://rightapps.net/robots.txt
```
- Confirm it does NOT block Googlebot from important pages
- Check: `Disallow: /` would block everything — catastrophic error
- If hosted as static site: verify robots.txt was deployed correctly after last update

### Step 3 — Check Sitemap
```
Visit: https://rightapps.net/sitemap.xml
```
- Does it load?
- Are all important pages listed?
- GSC → Sitemaps: when was it last fetched? Any errors?

### Step 4 — Check Server Errors
- Are 5xx errors appearing? This means server-side issues
- Contact hosting provider if server errors persist for >1 h
- Static sites (your setup): likely a CDN/hosting configuration issue

### Step 5 — Fix & Re-Submit
1. Fix the identified error
2. GSC → URL Inspection → paste affected URL → "Request Indexing"
3. GSC → Sitemaps → re-submit sitemap if errors were found there
4. Monitor Coverage report for next 3–7 days to confirm resolution

### Response Actions
- robots.txt block: Fix file immediately, re-deploy
- Sitemap error: Regenerate sitemap XML, re-submit
- 5xx errors: Contact hosting support, check CDN settings
- Soft 404s: Add real content or set up proper 301 redirect

---

## 4. ZATCA Keyword Loss Playbook

**Triggered by:** RANK-008, COMP-002, OPP-001 (ZATCA cluster)  
**Severity:** URGENT  
**Resolution target:** Same-day diagnosis; fix within 48 h

> **Why this is Priority #1:** ZATCA compliance keywords are Rightway's fastest path to leads. They are low competition, high intent. Any loss here directly impacts pipeline.

### Step 1 — Confirm the Drop (10 min)
- Manually search these keywords in incognito (Saudi IP if possible using VPN):
  - "ZATCA integration"
  - "ZATCA Phase 2 compliance"
  - "ZATCA e-invoicing solution"
  - "ZATCA e-invoicing Saudi Arabia"
- Record positions. Compare with last week's CSV in `rank-history/`

### Step 2 — Check the ZATCA Landing Pages (15 min)
- Visit: `rightapps.net/service-details.html#zatca-fbr`
- Visit: `rightapps.net/solutions/zatca-compliance` (when live)
- Check:
  - Page loads correctly?
  - Is keyword in H1, H2, meta title, meta description?
  - Is there a clear call to action (contact form / phone)?
  - Is there schema markup (FAQ, Service)?

### Step 3 — Check for New Competitor
- Who is now above you? New entrant or existing competitor that improved?
- Audit their page:
  - Word count vs. yours
  - Do they mention ZATCA Phase 2 deadlines/details?
  - Do they have customer logos, case studies, certifications?
  - Do they have FAQ schema?

### Step 4 — Check for Regulation Changes
- Did ZATCA announce Phase 3 or update Phase 2 requirements?
- Visit: https://zatca.gov.sa/en/
- If regulation changed: **you must update your page immediately** to reflect current requirements — this is both an SEO and business credibility issue

### Step 5 — Strengthen the ZATCA Page
Content actions (in priority order):
1. **Add/update specific details:** Phase 2 timeline, what compliance means, technical specs
2. **Add FAQ block:** Answer "What is ZATCA Phase 2?", "Who needs to comply?", "How long does integration take?"
3. **Add FAQ schema markup** (JSON-LD)
4. **Add regulation authority signals:** Link to official ZATCA portal
5. **Add social proof:** Client industry (e.g., "trusted by retail chains in Saudi Arabia")
6. **Add internal links** from homepage and services page to the ZATCA page

### Step 6 — Link Building (if drop is persistent)
- Reach out to Pakistan tech news/blog sites for a mention
- Consider a "ZATCA Phase 2 Guide" blog post linking to the service page
- List the ZATCA service on Pakistani tech directories

### Escalation
- Day 1: Run Steps 1–3 (solo)
- Day 2: Implement Steps 4–5 content updates
- Day 7: No recovery → commission a "ZATCA Phase 2 Complete Guide" long-form blog post (link magnet)
- Day 14: Evaluate paid search (Google Ads) for ZATCA terms as bridge while organic recovers

---

## 5. 404 Error Spike Playbook

**Triggered by:** TECH-001  
**Severity:** URGENT  
**Resolution target:** Fix critical 404s within 24 h

### Step 1 — Identify Affected URLs
- GSC → Coverage → "Not found (404)" → sort by impressions (highest first)
- Export list

### Step 2 — Categorise the 404s
| Type | Action |
|---|---|
| Old URL that was renamed/moved | 301 redirect old → new URL |
| URL that was deleted intentionally | 301 redirect to closest relevant page |
| URL that was deleted by mistake | Restore the page |
| URL mistyped in backlink | Redirect to correct page |
| URL in sitemap that no longer exists | Remove from sitemap |

### Step 3 — Implement 301 Redirects
- For a static site: update your hosting `.htaccess` or Netlify/hosting redirect rules
- Ensure redirect goes to the most relevant existing page, not just homepage

### Step 4 — Clean Up Sitemap
- Remove any 404 URLs from sitemap.xml
- Re-submit sitemap in GSC

### Step 5 — Fix Internal Links
- Search your site HTML for links pointing to the old/broken URL
- Update to the correct URL

---

## 6. CTR Drop Playbook

**Triggered by:** TRAF-004  
**Severity:** REVIEW  
**Resolution target:** Identify cause within 48 h; test new meta within 1 week

### Step 1 — Identify Which Pages/Keywords Have Low CTR
- GSC → Performance → sort queries by impressions DESC
- Filter: CTR < 2% for top-20 queries by impressions = underperforming titles

### Step 2 — Check SERP Appearance
- Manually search the keyword
- Is your title/description showing as expected?
- Does it look compelling vs. competitors?
- Has Google started showing AI Overviews that push your result below the fold?

### Step 3 — Rewrite Meta Tags for These Pages
**Title tag formula:** `[Primary Keyword] — [Key Benefit] | Rightway Systems`  
**Meta description formula:** Start with action/benefit. Include primary keyword. Add CTA. Max 155 chars.

### Step 4 — Monitor CTR After Change
- GSC updates with ~3–4 day lag
- Check back after 1 week to measure CTR improvement

---

## 7. Competitor Surge Playbook

**Triggered by:** COMP-001, COMP-002  
**Severity:** MONITOR / ALERT  
**Resolution target:** Competitive response within 1 week

### Step 1 — Identify the Competing Page
- URL, domain, content type (service page? blog post? directory listing?)

### Step 2 — Gap Analysis
| Factor | Competitor | Rightway | Gap? |
|---|---|---|---|
| Word count | ? | ? | |
| Has FAQ section | ? | ? | |
| Has schema markup | ? | ? | |
| Has case studies | ? | ? | |
| Page load speed | ? | ? | |
| Internal links to page | ? | ? | |

### Step 3 — Prioritised Response
1. Fill any content gaps (add sections they have that you don't)
2. Add schema markup if missing
3. Improve page load performance
4. Build internal links to the page
5. If they have case studies you don't: reach out to 1–2 clients for a short quote/testimonial

---

## 8. Core Web Vitals Degradation Playbook

**Triggered by:** TECH-004  
**Severity:** REVIEW  
**Resolution target:** Diagnose within 1 week; fix within 2 weeks

### Step 1 — Run PageSpeed Insights
- https://pagespeed.web.dev/ → test your top 5 pages
- Which metric is failing: LCP? INP? CLS?

### Step 2 — Common Fixes for Static Sites
| Issue | Common Cause | Fix |
|---|---|---|
| LCP > 2.5s | Large hero image | Compress images, use WebP, add `loading="lazy"` |
| CLS > 0.1 | Images without dimensions | Add `width` and `height` attributes to all images |
| INP > 200ms | Heavy JavaScript | Defer non-critical JS; remove unused scripts |
| Slow TTFB | Hosting/CDN issue | Check hosting response time; consider CDN |

### Step 3 — Escalate to Developer
- Share PageSpeed Insights report URL
- Specify which metric(s) are failing and on which pages

---

## 9. Page 2 Opportunity Playbook

**Triggered by:** RANK-007, OPP-001, OPP-002, OPP-005  
**Severity:** OPTIMIZE  
**Resolution target:** Implement within next content sprint (2 weeks)

> Page 2 keywords (positions 11–20) are the **highest ROI activity**. A small improvement can double or triple organic traffic with minimal effort.

### Step 1 — Identify the Opportunity
- Weekly rank check → filter keywords at positions 11–20
- Sort by: search volume DESC (highest volume page-2 keyword = biggest win)

### Step 2 — Quick Win Checklist for Target Page
- [ ] Is the primary keyword in the `<title>` tag?
- [ ] Is the primary keyword in the H1?
- [ ] Does the page have at least 1 H2 or H3 containing the keyword?
- [ ] Is the meta description compelling and does it include the keyword?
- [ ] Does the page have at least 2 internal links pointing to it from other pages?
- [ ] Is the page loading fast (< 2.5s LCP)?
- [ ] Does the page have FAQ schema if there are question-type searches?

### Step 3 — Content Refresh
- Add 200–400 words of useful content to the page (FAQ, process steps, comparison table)
- Address any unanswered questions visible in the PAA box for this keyword
- Update meta description to be more click-worthy

### Step 4 — Add Internal Links
- From the homepage sidebar/footer
- From 2–3 relevant service pages
- From any blog posts covering related topics

### Step 5 — Monitor
- Check position again after 2–3 weeks
- Log improvement in rank-history CSV

---

## Escalation Matrix

| Alert Severity | First Response | Time Limit | Escalate To |
|---|---|---|---|
| URGENT | Solo investigation | 4 hours | Web developer if technical; content team if content |
| WARNING | Next morning | 24 hours | Review with team if no progress |
| REVIEW | Within 48 hours | 1 week | Discuss in weekly SEO review |
| ALERT | Same day | 24 hours | Evaluate competitive response |
| MONITOR | Weekly review | 2 weeks | Adjust strategy if trend persists |
| OPTIMIZE | Next sprint | 2 weeks | Add to content calendar |

---

*Last updated: April 2025 · Review quarterly or after any major Google algorithm update*
