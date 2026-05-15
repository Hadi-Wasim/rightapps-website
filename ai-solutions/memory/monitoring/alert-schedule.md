# SEO Monitoring Schedule
**Company:** Rightway Systems (rightapps.net)  
**Owner:** info@rightapps.net  
**Version:** 1.0 · April 2025  

> Designed for a **single executive** managing SEO. Total active monitoring time: ~35 min/week.

---

## Daily Check (5 minutes) — Every Weekday Morning

**When:** 9:00 AM before checking email  
**Tool:** Google Search Console  
**Time required:** 5 minutes

### Checklist
- [ ] Open GSC → **Coverage** tab → any new errors since yesterday?
- [ ] Open GSC → **Manual Actions** → any warnings? (should always say "No issues detected")
- [ ] Open GSC → **Security Issues** → any warnings?
- [ ] Check that site loads: visit `rightapps.net` to confirm it's up and fast

### If You See Errors
- New crawl errors > 5 → trigger **Crawl Error Playbook** (alert-playbooks.md #3)
- Any manual action → trigger **Ranking Drop Playbook** step 2 immediately
- Site down → contact hosting support first priority

### Log
Record any anomalies in a simple note or the rank-history folder with today's date.

---

## Weekly Check (30 minutes) — Every Monday Morning

**When:** Monday, 9:00–9:30 AM  
**Tools:** Google Search Console + manual SERP checks  
**Time required:** 30 minutes

### Part A: Rank Check — Core Keywords (15 min)

Search each keyword below in an **incognito browser window** and record position in the rank-history CSV.

#### ZATCA Priority Cluster (check every week)
| Keyword | Expected Range | Record in CSV |
|---|---|---|
| ZATCA integration | Top 10 target | ✓ |
| ZATCA Phase 2 compliance | Top 10 target | ✓ |
| ZATCA e-invoicing solution | Top 10 target | ✓ |
| ZATCA e-invoicing Saudi Arabia | Top 20 target | ✓ |
| FBR integration Pakistan | Top 10 target | ✓ |
| e-invoicing Pakistan | Top 20 target | ✓ |

#### Brand & Homepage (check every week)
| Keyword | Expected Range | Record in CSV |
|---|---|---|
| Rightway Systems | #1 | ✓ |
| software house Pakistan | Top 20 target | ✓ |
| software house Lahore | Top 20 target | ✓ |

#### Core Services (check every week)
| Keyword | Expected Range | Record in CSV |
|---|---|---|
| ERP software Pakistan | Top 20 target | ✓ |
| AI chatbot development Pakistan | Top 10 target | ✓ |
| LMS software Pakistan | Top 20 target | ✓ |
| POS system Pakistan | Top 20 target | ✓ |

### Part B: GSC Performance Review (10 min)
- GSC → Performance → **Compare: last 7 days vs previous 7 days**
- Check: Total clicks — up or down?
- Check: Total impressions — up or down?
- Check: Average CTR — up or down?
- Check: Average position — up or down? (lower number = better)
- Flag any metric with >15% negative change → triggers appropriate playbook

### Part C: Update Rank History CSV (5 min)
- File location: `memory/monitoring/rank-history/`
- Add today's date column with positions recorded above
- Note any movements of ±5 positions or more

### Weekly Alert Triggers
| If you see... | Alert Level | Action |
|---|---|---|
| Any ZATCA keyword drops 5+ positions | URGENT | ZATCA Keyword Loss Playbook |
| Total clicks down >30% WoW | URGENT | Traffic Drop Playbook |
| Total clicks down 15–29% WoW | WARNING | Traffic Drop Playbook |
| Any new manual action/security issue | URGENT | Contact developer immediately |
| Any keyword enters top 10 for first time | SUCCESS | Log win, add internal links |
| Multiple keywords on page 2 (11–20) | OPTIMIZE | Add to next sprint backlog |

---

## Monthly Check (60 minutes) — First Monday of Each Month

**When:** First Monday of each month, 9:00–10:00 AM  
**Tools:** GSC, manual audits, competitor review  
**Time required:** 60 minutes

### Part A: Technical SEO Mini-Audit (20 min)
- [ ] Run `rightapps.net` through PageSpeed Insights (mobile + desktop for homepage and ZATCA page)
- [ ] GSC → Coverage: review full index count — growing or shrinking?
- [ ] GSC → Sitemaps: confirm sitemap is fetched and all URLs submitted
- [ ] Test `rightapps.net/robots.txt` — confirm no important pages blocked
- [ ] Check all core pages load: index, services, contact, ZATCA, ERP, LMS, POS, AI pages
- [ ] Check contact form works (submit a test message)

### Part B: SERP Freshness Check (15 min)
- Manually search top 5 ZATCA keywords in incognito (from Saudi perspective if possible)
- Manually search "software house Pakistan" and "ERP software Pakistan"
- Note: Are new competitors appearing? Has search intent changed?
- Screenshot any significant SERP changes for records

### Part C: Content & EEAT Signal Review (15 min)
- [ ] Is there any new ZATCA / FBR regulation update to reflect in content?
- [ ] Do the top-priority pages (ZATCA, ERP, AI) still feel authoritative and current?
- [ ] Is there a new blog post opportunity from this month's keyword performance?
- [ ] Review Google Alerts digest from the month (see google-alerts-setup.md)

### Part D: Competitor Moves (10 min)
- Search "ZATCA integration software" — who is in top 5?
- Search "software house Pakistan" — any new entrants?
- Check 1–2 competitor websites for new content/service pages

### Monthly Summary
Log a brief monthly summary in `memory/monitoring/` named:
```
YYYY-MM-monthly-seo-summary.md
```
Include: top keyword positions, traffic trend, technical issues found/fixed, content published, competitor notes.

---

## Quarterly Review (3–4 hours) — First Week of Each Quarter

**When:** Q1 (Jan), Q2 (Apr), Q3 (Jul), Q4 (Oct) — first Monday  
**Time required:** Half a day

### Agenda

#### 1. Phase Progress Review (45 min)
- How many target keywords are now in top 10 / top 20?
- What is the overall organic traffic trend vs. quarter start?
- Which pages are performing best? Worst?
- Review all "OPTIMIZE" alerts from the quarter — were they addressed?

#### 2. Strategy Adjustment (30 min)
- Are ZATCA/FBR keywords performing as expected?
- Are there new keyword clusters to add (new services, new markets)?
- Should threshold settings be tightened now that there's 3+ months of baseline data?
- Update `alert-config.json` thresholds if needed

#### 3. Full Technical Audit (60 min)
- Run full crawl using free tools (Screaming Frog free: up to 500 URLs)
- Check all redirect chains
- Identify any orphan pages (no internal links pointing to them)
- Review all page titles and meta descriptions for any that need refreshing

#### 4. EEAT & Authority Review (30 min)
- Is there an About page with team credentials?
- Are there any backlinks gained this quarter? From which domains?
- Is Rightway listed on any industry directories / Google Business Profile updated?

#### 5. Content Calendar for Next Quarter (30 min)
- Based on Page 2 opportunities → prioritise 2–3 pages for content refresh
- Based on PAA opportunities → plan 1–2 new FAQ sections
- Plan 1 new long-form article (suggested: ZATCA Phase 2 guide if not yet published)

#### 6. Update All Memory Files
- Update `alert-config.json` with any threshold changes
- Archive old monthly summaries
- Update `rank-history/` with quarterly trend annotations

---

## Tool Stack (Free-Only)

| Tool | Purpose | URL |
|---|---|---|
| Google Search Console | Rankings, traffic, crawl errors, CWV | search.google.com/search-console |
| Google PageSpeed Insights | Core Web Vitals per page | pagespeed.web.dev |
| Google Alerts | Brand + competitor + industry mentions | google.com/alerts |
| Incognito Browser | Manual rank checks | Built into any browser |
| Screaming Frog (free) | Crawl up to 500 URLs | screamingfrog.co.uk/seo-spider |
| Google Analytics 4 | Traffic source breakdown | analytics.google.com |

---

## Notification Channels

| Channel | Use For | Owner |
|---|---|---|
| Email: info@rightapps.net | All automated GSC alerts, weekly digests | Primary |
| WhatsApp Group | URGENT alerts escalation (manual forward) | Backup |
| Google Alerts email digest | Brand, competitor, industry news | Weekly digest |

---

*Review this schedule quarterly. As domain matures (6–12 months), add rank tracking tool like Google Search Console API or SERPWatcher (paid) for automated position tracking.*
