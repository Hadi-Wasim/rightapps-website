# Rank Tracking Playbook — Rightway Systems
**Domain:** rightapps.net  
**Markets:** Pakistan (PK) · Saudi Arabia (SA) · UAE (AE)  
**Last Updated:** 2026-04-25  

---

## Table of Contents
1. [Overview & Tools](#overview)
2. [Weekly Rank Check Process](#weekly-process)
3. [How to Use Google Search Console](#gsc-guide)
4. [Manual Position Checks](#manual-checks)
5. [How to Update CSV Files](#csv-updates)
6. [Interpreting Ranking Changes](#interpreting-changes)
7. [Escalation Rules](#escalation)
8. [Monthly Reporting](#monthly-reporting)
9. [Priority Keyword Dashboard](#priority-dashboard)
10. [Troubleshooting Common Issues](#troubleshooting)

---

## 1. Overview & Tools {#overview}

### Recommended Tool Stack (Free → Paid)

| Tool | Cost | Best For | Access |
|------|------|----------|--------|
| **Google Search Console** | Free | Impressions, clicks, average position for verified domain | search.google.com/search-console |
| **Google Search (Incognito)** | Free | Manual position checks, SERP feature observation | Any browser in incognito |
| **Ubersuggest** | Free (3/day) or $12/mo | Keyword tracking, competitor overview | app.neilpatel.com/en/ubersuggest |
| **SEMrush** | Free trial / $119/mo | Full rank tracking, competitor gap, backlink | semrush.com |
| **Ahrefs** | $99/mo | Keyword explorer, rank tracker, backlinks | ahrefs.com |
| **Rank Math SEO** | Free plugin | WordPress-based on-page SEO scoring | rankmath.com |

> **Recommended starting stack:** Google Search Console (always-on, free) + Ubersuggest free tier for weekly spot-checks. Graduate to SEMrush trial at 60 days to benchmark competitors.

---

## 2. Weekly Rank Check Process {#weekly-process}

### Schedule
- **Day:** Every Monday morning
- **Time:** ~45 minutes total
- **File to update:** `rank-history/YYYY-MM-DD.csv` (copy from `tracking-template.csv`)

### Step-by-Step Weekly Workflow

#### Step 1: Export from Google Search Console (15 min)
1. Go to [Google Search Console](https://search.google.com/search-console)
2. Select property: `rightapps.net`
3. Navigate to **Performance → Search Results**
4. Set date range: **Last 7 days** (or compare to previous 7 days)
5. Click **+ New** → Filter by **Query** → "contains" → check each keyword group
6. Export data: click the **↓ Export** button → CSV
7. Rename file as `gsc-export-YYYY-MM-DD.csv`

#### Step 2: Cross-check Manual Positions (20 min)
For **Critical/High priority keywords** only (don't check all 77 every week):

**Weekly manual check list (rotate):**
- Week A: All ZATCA/FBR group (20 keywords) — **always check these**
- Week B: AI & Automation + LMS groups (21 keywords)
- Week C: ERP + Development Services groups (20 keywords)
- Week D: Hero/Brand + Geographic groups (16 keywords)

**Manual check procedure:**
```
1. Open browser in Incognito/Private mode (CRITICAL — prevents personalization)
2. Go to google.com.pk (for PK keywords) or google.com.sa (for SA keywords)
3. Search the exact keyword with quotes if needed: "ZATCA e-invoicing solution"
4. Note position number (count from 1, ignore ads)
5. Note the URL that is ranking (may not be target page)
6. Check if any SERP features present: Featured Snippet, PAA, Local Pack
7. Record in CSV
```

> ⚠️ **NEVER check rankings while logged into Google.** Always use incognito mode. Personalized results are not real positions.

#### Step 3: Update Tracking CSV (10 min)
1. Copy `tracking-template.csv` to `rank-history/YYYY-MM-DD.csv`
2. Fill in all observed positions
3. Use `Not Ranking` for positions > 100 or not found
4. Calculate `position_change` as: previous_position - current_position (positive = improved)
5. Add notes for any anomalies

---

## 3. How to Use Google Search Console {#gsc-guide}

### Key Reports for Rank Tracking

#### Performance Report
- **Path:** Performance → Search results
- **Metrics to track:** Total clicks, Total impressions, Average CTR, Average position
- **Key insight:** GSC shows average position over time — useful for trend analysis

#### Position Tracking by Query
1. Go to Performance → Search Results
2. Set date range to compare periods (e.g., this week vs. last week)
3. Click on any query to see position trend chart
4. Sort by **Average Position** ascending to find near-page-1 keywords

#### Indexing Status
- **Path:** Indexing → Pages
- Check that new pages (like `/solutions/zatca-compliance`) are indexed
- If a page is not indexed after 7 days of publishing, submit via **URL Inspection** → Request Indexing

#### GSC Position vs. Manual Check Discrepancy
GSC shows average position across all searches over the period. Manual checks are point-in-time. Both are valid — use GSC for trends, manual checks for spot verification.

### Setting Up Search Console for Multi-Region Tracking
1. Verify domain as a **Domain property** (not URL-prefix) for full coverage
2. Set **International Targeting**: Settings → International Targeting → Target: Pakistan
3. For SA/UAE rankings, create separate URL-prefix properties for those search engines if needed
4. Link GSC to Google Analytics 4 for combined insights

---

## 4. Manual Position Checks {#manual-checks}

### By Market

| Market | URL to use | VPN needed? |
|--------|-----------|-------------|
| Pakistan | `google.com.pk` | No (if in PK) / Yes (if outside PK) |
| Saudi Arabia | `google.com.sa` | Yes (use SA VPN endpoint) |
| UAE | `google.ae` | Yes (use UAE/AE VPN endpoint) |

### Position Recording Guide

| Result | Record as | Notes |
|--------|-----------|-------|
| Found on page 1 | `1`–`10` | Count exact position including sitelinks |
| Found on page 2 | `11`–`20` | |
| Found on page 3-5 | `21`–`50` | Spot-check a few to confirm |
| Found on page 6-10 | `51`–`100` | |
| Not found in top 100 | `Not Ranking` | Confirmed no presence |
| SERP feature (snippet) | `Featured` | Note separately + count position |
| Knowledge Panel | `KP` | Brand searches |

### SERP Feature Tracking
When checking positions, also note:
- **📦 Featured Snippet** — record as `FS-X` where X is organic position below snippet
- **❓ People Also Ask** — note which questions include Rightway content
- **🗺️ Local Pack** — appears for city-level keywords; track separately
- **🛒 Shopping** — not relevant for B2B services
- **📰 News** — check if Rightway blog posts appear

---

## 5. How to Update CSV Files {#csv-updates}

### File Naming Convention
```
rank-history/
├── 2026-04-25-baseline.csv     ← Initial baseline (never modify)
├── 2026-04-28.csv              ← First weekly check
├── 2026-05-05.csv              ← Second weekly check
├── tracking-template.csv       ← Template (never modify)
└── monthly-summary/
    ├── 2026-04-summary.csv
    └── 2026-05-summary.csv
```

### Weekly CSV Update Steps
```
1. Copy tracking-template.csv:
   cp tracking-template.csv rank-history/YYYY-MM-DD.csv

2. Open the new file in Excel or Google Sheets

3. Replace all YYYY-MM-DD in the 'date' column with today's date

4. Fill in 'position' column for each keyword checked

5. Calculate 'position_change':
   - Previous week position: 35
   - This week position: 22
   - Change: +13 (improved — use positive number for gains)
   - Change: -7 would mean dropped 7 positions

6. Fill 'url_ranking' with the actual URL Google shows ranking

7. Fill GSC columns (impressions, clicks, ctr) from GSC export

8. Add notes for:
   - New pages that started ranking
   - Significant jumps (±5 or more)
   - New SERP features acquired
   - Competitor changes noticed
```

### Monthly Summary Creation
At end of each month, create a summary CSV:
- Copy all weekly CSVs into Google Sheets
- Use pivot table: keyword × week showing position
- Calculate: Month-start vs Month-end delta per keyword
- Save as `monthly-summary/YYYY-MM-summary.csv`

---

## 6. Interpreting Ranking Changes {#interpreting-changes}

### What Changes Mean

| Change Type | What It Means | Action Required |
|-------------|---------------|-----------------|
| **New Ranking** (appears in top 100) | Page indexed, Google testing relevance | Add internal links to the page; monitor weekly |
| **Jump from 51-100 to 11-50** | Content quality recognized | Improve page depth; add FAQ schema |
| **Jump from 11-50 to top 10** | Strong relevance signal | Optimize meta title/description for CTR; build 1-2 backlinks |
| **Jump from top 10 to top 3** | Content authority established | Protect with fresh content updates every 90 days |
| **Drop of 1-4 positions** | Normal fluctuation | Monitor only; no action needed |
| **Drop of 5-9 positions** | Algorithm update or competitor activity | Investigate immediately (see Escalation) |
| **Drop of 10+ positions** | Penalty, major algorithm shift, or content issue | Urgent escalation |
| **Drops to "Not Ranking"** | De-indexing or severe penalty | Check GSC for manual actions immediately |

### Volatility Context

| Situation | Expected Volatility | Normal Range |
|-----------|---------------------|-------------|
| Brand new domain (months 1-3) | Very high | ±10-20 positions weekly |
| Growing domain (months 4-6) | High | ±5-10 positions weekly |
| Established domain (6+ months) | Medium | ±2-5 positions weekly |
| During Google Core Update | Very high | ±20+ positions; wait 2 weeks before acting |

### Quick Win Keyword Expected Progression
For ZATCA/FBR and AI/LMS keywords (Low competition):
```
Week 1-2:   Not Ranking (Google crawling, no signal)
Week 3-4:   Appears 51-100 (Google testing relevance)
Week 5-8:   Moves to 11-50 (Content quality being assessed)
Week 9-12:  Enters top 10 (Domain trust building)
Week 13+:   Consolidates top 5 (With backlink support)
```

---

## 7. Escalation Rules {#escalation}

### Escalation Triggers

#### 🔴 CRITICAL — Escalate Same Day
- Any Critical-priority keyword drops **10+ positions** in a single week
- Any page **disappears from top 100** (was ranking, now "Not Ranking")
- GSC shows **Coverage errors** on a page that was ranking
- Domain receives a **manual action** (GSC → Security & Manual Actions)

#### 🟠 HIGH — Escalate Within 48 Hours
- Any Critical or High-priority keyword drops **5-9 positions** in a single week
- Traffic from GSC drops **>30%** week-over-week
- ZATCA/FBR page drops out of top 10 after achieving it

#### 🟡 MEDIUM — Investigate This Week
- 3+ keywords in same group drop **3-4 positions** simultaneously (may indicate competitor content update)
- A High-priority keyword has been "Not Ranking" for **4+ weeks** despite page being live

### Escalation Investigation Checklist
When a drop is detected:

```
□ 1. Check Google Search Console for:
     - Manual actions (Security & Manual Actions tab)
     - Coverage errors (Indexing → Pages → Error tab)
     - Recent crawl errors
     
□ 2. Check if a Google Core Update was announced:
     - Search "Google algorithm update [current date]"
     - moz.com/google-algorithm-change-history
     
□ 3. Check the competing page:
     - Search the keyword in incognito
     - Who is now ranking above us?
     - Is their content newer, longer, or more authoritative?
     
□ 4. Check our page:
     - Is it still loading correctly?
     - Has any content been removed or changed?
     - Check the page's last modified date
     
□ 5. Check backlink changes:
     - Did we lose any backlinks? (GSC → Links)
     - Did the competing page gain backlinks?
     
□ 6. Actions to take based on findings:
     - If Core Update: wait 2 weeks; then refresh content
     - If competitor gained: add more depth, data, or case studies
     - If our page changed: revert or improve the change
     - If technical issue: fix crawl errors immediately
```

---

## 8. Monthly Reporting {#monthly-reporting}

### Monthly Rank Report Template

**Report: Rightway Systems SEO Rankings — [Month] [Year]**

**Executive Summary**
- Total keywords tracked: 77
- Keywords now ranking (any position): [X]
- Keywords in top 10: [X]
- Keywords in top 3: [X]
- Biggest wins this month: [list]
- Biggest drops this month: [list]

**Group Performance**

| Group | Keywords | Ranking | Top 10 | vs. Last Month |
|-------|----------|---------|--------|----------------|
| ZATCA/FBR Compliance | 20 | X | X | ↑/↓ X |
| AI & Automation | 13 | X | X | ↑/↓ X |
| LMS & Education | 8 | X | X | ↑/↓ X |
| ERP Solutions | 10 | X | X | ↑/↓ X |
| Development Services | 10 | X | X | ↑/↓ X |
| Hero/Brand | 8 | X | X | ↑/↓ X |
| Geographic/Regional | 8 | X | X | ↑/↓ X |

**Top Performing Keywords**
[List top 10 keywords by position improvement]

**Keywords Needing Attention**
[List keywords that dropped or remain stuck]

**Content Actions This Month**
[List new pages, blog posts, schema markup added]

**Next Month's Focus**
[Priority keywords to improve based on data]

---

## 9. Priority Keyword Dashboard {#priority-dashboard}

### Top 20 Keywords to Watch Most Closely

These 20 keywords represent the highest ROI opportunities. Check manually every week regardless of rotation schedule.

| # | Keyword | Group | Volume | Competition | 30d Target |
|---|---------|-------|--------|-------------|------------|
| 1 | ZATCA e-invoicing Saudi Arabia | ZATCA/FBR | 720/mo | Low | Top 10 |
| 2 | FBR e-invoicing software Pakistan | ZATCA/FBR | 320/mo | Low | Top 10 |
| 3 | ZATCA Phase 2 compliance | ZATCA/FBR | 590/mo | Low | Top 10 |
| 4 | FBR POS integration | ZATCA/FBR | 260/mo | Low | Top 10 |
| 5 | LLM fine-tuning services | AI/LLM | 320/mo | Low | Top 10 |
| 6 | custom ERP development Pakistan | ERP | 170/mo | Low | Top 10 |
| 7 | AI chatbot development Pakistan | AI | 260/mo | Low | Top 10 |
| 8 | LMS for schools Pakistan | LMS | 140/mo | Low | Top 10 |
| 9 | Python development company Pakistan | Dev | 110/mo | Low | Top 5 |
| 10 | ZATCA integration | ZATCA/FBR | 880/mo | Low | Top 10 |
| 11 | ERP software Pakistan | ERP | 880/mo | Medium | Top 20 |
| 12 | software house Lahore | Brand | 720/mo | Medium | Top 20 |
| 13 | hire software developers Pakistan | Dev | 390/mo | Medium | Top 20 |
| 14 | POS system Pakistan | POS | 590/mo | Medium | Top 20 |
| 15 | RAG chatbot development | AI/LLM | 170/mo | Low | Top 5 |
| 16 | GPT integration services Pakistan | AI/LLM | 110/mo | Low | Top 5 |
| 17 | ERP software for manufacturing Pakistan | ERP | 90/mo | Low | Top 5 |
| 18 | ZATCA compliant POS | ZATCA/FBR | 170/mo | Low | Top 5 |
| 19 | full stack development company Pakistan | Dev | 170/mo | Medium | Top 20 |
| 20 | e-invoicing Pakistan | ZATCA/FBR | 720/mo | Low | Top 10 |

---

## 10. Troubleshooting Common Issues {#troubleshooting}

### Issue: Page is live but not ranking after 4 weeks

**Possible Causes & Fixes:**
1. **Not indexed yet** → Go to GSC → URL Inspection → Request Indexing
2. **Thin content** → Add at least 800-1,200 words of original, structured content
3. **No internal links** → Add 3+ internal links from other pages to this page
4. **No external links** → Submit URL to Pakistan and SA business directories

### Issue: Ranking for wrong page (not target page)

**Fix:**
1. Add `<link rel="canonical">` to the target page pointing to itself
2. On the wrong page, add a canonical tag pointing to the target page
3. Add an internal link FROM the wrong-ranking page TO the target page
4. Review content overlap between the two pages

### Issue: Ranking fluctuates wildly week-to-week (±20 positions)

**This is normal for new domains in months 1-3.** Google is "testing" the content.

**To stabilize:**
1. Get 2-3 quality backlinks pointing specifically to that page
2. Add structured data (FAQ schema, HowTo schema) to the page
3. Increase dwell time signals: add videos, images, interactive elements
4. Publish a supporting blog post that links to the ranking page

### Issue: Position is 11-20 (page 2) and stuck for 4+ weeks

**The "page 2 trap" fix:**
1. Audit the top 5 competing pages for word count, topics covered, media used
2. Identify 3-5 topics your page is missing that competitors cover
3. Add those sections to your page
4. Update the meta title to be more compelling/click-worthy
5. Add FAQ schema to capture PAA (People Also Ask) boxes
6. Build 1-2 relevant backlinks (directory listings, guest posts, PR)

### Issue: GSC shows impressions but zero clicks

**Fix:**
1. Your meta title and description are not compelling enough
2. Rewrite the meta title to include an emotional hook or unique value proposition
3. Rewrite the meta description with a clear CTA ("Learn how to integrate ZATCA Phase 2 →")
4. Check if a competitor has a featured snippet for this keyword — target the exact format

### Issue: Ranking well in PK but not in SA/UAE

**Fix:**
1. Create separate `/solutions/zatca-compliance` page specifically for Saudi Arabia audience
2. Add `hreflang` tags if serving multiple language audiences
3. Set up separate Google Business Profile for Saudi Arabia/UAE office
4. Get .sa domain backlinks (Saudi Arabia government/business directories)
5. Consider creating Arabic-language versions of key ZATCA/ERP pages

---

## Appendix: Key Dates & Reference

### Google Algorithm Update Tracking
- Monitor: [moz.com/google-algorithm-change-history](https://moz.com/google-algorithm-change-history)
- Monitor: [seroundtable.com](https://www.seroundtable.com) for daily updates
- During confirmed Core Updates: **do not make content changes for 2 weeks**; wait for rollout to complete

### ZATCA Timeline Reference (SA Market)
- ZATCA Phase 2 Wave 1: January 2023 (Large businesses)
- ZATCA Phase 2 Wave 2: July 2023 (Mid-size businesses)
- ZATCA Phase 2 Wave 3: October 2023 onwards (SMEs)
- All businesses in Saudi Arabia must be compliant — search demand will persist for years

### FBR POS Integration Reference (PK Market)
- FBR SWFT POS mandate rolled out to Tier-1 retailers in major cities
- Search demand will grow as enforcement expands
- Keywords peak around FBR tax filing seasons (June-July, December-January)

---

*Playbook created: 2026-04-25*  
*Campaign: Rightway Systems Phase 2 SEO*  
*Next review: 2026-07-25 (quarterly)*
