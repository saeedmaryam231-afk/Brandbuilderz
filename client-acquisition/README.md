# BrandBuilderz Client Acquisition

Message: **"Google Ads that get US home service businesses more booked jobs."** Offer: a free Google Ads audit.

| Agent | Status | Lives in |
|---|---|---|
| 1. Lead Finder | built | `.claude/agents/lead-finder.md` |
| 2. Outreach Drafter | built | `.claude/agents/outreach-drafter.md` |
| 3. LinkedIn Content | not yet | |

## Running the Lead Finder

In Claude Code, from this project:

- `/find-leads` runs the next `todo` market in `markets.csv` and aims for 20 leads.
- `/find-leads 10 roofing Tampa FL` runs a specific market.
- You can also just say: "use the lead-finder agent to find 15 towing leads in Denver".

A lead is saved only if the business shows Google Ads evidence (an `AW-` conversion tag
or a sponsored result), has a public email or LinkedIn for the owner/decision-maker,
and has one specific, verifiable ad or landing-page issue.

## Files

- `markets.csv` holds the niche × city rotation (40 markets). Edit freely and add rows with `status=todo`.
- `leads/leads.csv` holds the output. It's **gitignored** and blocked on Netlify, so lead data
  never ends up on GitHub or the live site. If you upload the site by zip or by hand,
  leave `client-acquisition/` out.

## Drafting outreach (Agent 2)

- `/draft-outreach` drafts an email, a LinkedIn note and follow-ups for every `new` lead.
- Drafts go to `outreach/drafts-YYYY-MM-DD.md` (gitignored). Each lead has a research
  check and an `[ ] Approved` box. Edit freely, send it yourself, then set the lead's
  status to `sent` in `leads.csv`.
- Lead status moves `new` → `drafted` (or `needs-contact`) → `sent` (set by you only).

The `status` column starts as `new`. Agent 2 will read rows with `status=new`.
Nothing is ever sent automatically.
