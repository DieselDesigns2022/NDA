<?php
declare(strict_types=1);

const NDA_VERSION = 'asset_moth_tester_nda_v2';

function nda_sections(): array
{
    return [
        'opening' => [
            'title' => 'Opening agreement / parties section',
            'body' => <<<'TXT'
# ASSET MOTH CONFIDENTIALITY & NON-DISCLOSURE AGREEMENT

## Alpha/Beta Tester Agreement

This Confidentiality and Non-Disclosure Agreement (“Agreement”) is entered into as of the date signed below (“Effective Date”) by and between:

**Disclosing Party:**
Angela Rodgers, also known as Diesel Designs
Founder / Creator / Admin of Asset Moth
Email: diesel.designs.contact@gmail.com

and

**Receiving Party / Tester:**
The Receiving Party / Tester is the person completing the required legal information, tester details, initials, acknowledgments, and electronic signature fields on this online form.

The submitted legal information, business details, testing phase, initials, acknowledgments, typed signature, drawn signature, IP address, user agent, and submission timestamp will be stored with the signed NDA record.

The Disclosing Party and Receiving Party may be referred to individually as a “Party” and collectively as the “Parties.”
TXT,
        ],
        'section_1' => [
            'title' => '1. Purpose of This Agreement',
            'body' => <<<'TXT'
## 1. Purpose of This Agreement

The Receiving Party has been selected or may be selected to participate in private testing for **Asset Moth**, including but not limited to Alpha testing, Beta testing, website testing, seller testing, buyer testing, payment testing, order testing, download testing, product upload testing, store setup testing, feature testing, feedback discussions, private group chats, and related pre-launch activities.

The purpose of this Agreement is to protect the private, confidential, proprietary, unreleased, and business-sensitive information related to Asset Moth, Angela Rodgers, Diesel Designs, the website build, marketplace concept, tester discussions, launch plans, features, tools, workflows, branding, business plans, content, policies, and all related materials.

By signing this Agreement, the Receiving Party agrees that they are being given private access to information that is not available to the public and that must not be shared, discussed, copied, leaked, posted, recreated, used, or disclosed outside of the approved Asset Moth testing environment.
TXT,
        ],
        'section_2' => [
            'title' => '2. Definition of Confidential Information',
            'body' => <<<'TXT'
## 2. Definition of Confidential Information

For purposes of this Agreement, “Confidential Information” includes any and all non-public information related to Asset Moth, whether shared verbally, visually, electronically, in writing, through screenshots, through screen recordings, through private messages, inside Facebook group chats, through the website itself, through documents, through emails, through testing access, or by any other method.

Confidential Information includes, but is not limited to:

### A. Website & Platform Information

1. The Asset Moth website, platform, marketplace, or any private testing version of the website.
2. Website pages, layouts, designs, structure, menus, navigation, dashboards, account areas, seller areas, buyer areas, admin areas, checkout areas, order areas, and user flows.
3. Website features, planned features, unreleased features, feature ideas, functionality, testing tools, seller tools, buyer tools, marketplace tools, payment tools, order tools, download tools, dashboard tools, store setup tools, upload tools, search tools, browsing tools, review tools, ranking tools, credit tools, referral tools, badge tools, and any other features or planned features.
4. Build details, development details, technical details, website structure, bugs, errors, limitations, fixes, test results, testing instructions, and platform behavior.
5. Any information about how the website works, how it is being built, what has been completed, what is still being worked on, what is planned, and what is being tested.

### B. Business & Marketplace Information

1. The Asset Moth concept, business model, launch strategy, future plans, private roadmap, marketplace structure, seller process, buyer process, commission structure, pricing plans, fees, policies, rules, seller requirements, buyer requirements, product review process, product approval process, and launch timeline.
2. Any private discussions about how Asset Moth will operate before, during, or after launch.
3. Any private plans related to Alpha testing, Beta testing, public launch, future growth, marketing, announcements, seller recruitment, buyer recruitment, badges, perks, founding member benefits, promotional ideas, future opportunities, or private business decisions.

### C. Branding, Content & Creative Materials

1. Asset Moth names, logos, submarks, graphics, visual identity, branding, color palettes, taglines, copywriting, page text, policies, FAQs, email drafts, announcements, social media plans, advertising ideas, product category ideas, and website content.
2. Any private content, documents, forms, screenshots, mockups, examples, graphics, or design materials shared with testers.
3. Any private or unreleased ideas connected to Asset Moth, whether fully developed or still in progress.

### D. Testing Information

1. Alpha testing instructions, Beta testing instructions, tester responsibilities, tester feedback, bug reports, issue reports, testing results, tester discussions, tester comments, screenshots, private conversations, group chat content, and admin responses.
2. Any purchases, test purchases, payment testing, order testing, download testing, product upload testing, seller store testing, buyer account testing, checkout testing, or other activities completed as part of the testing process.
3. Any errors, bugs, broken features, delays, technical issues, problems, improvements, weaknesses, or unfinished areas discovered during testing.

### E. Private Communications

1. All private messages, group chat messages, emails, comments, feedback, conversations, announcements, updates, instructions, or discussions involving Asset Moth testing.
2. Any communication between testers, Angela Rodgers, Diesel Designs, Asset Moth admins, or anyone else involved in the testing process.
3. Any names, identities, business names, profile information, or participation details of other testers, unless that information is made public by the tester themselves or by Angela Rodgers.

### F. Data, Accounts & Access

1. Login details, private links, passwords, test accounts, user account information, seller account information, buyer account information, order information, payment information, purchase information, product information, uploaded files, download links, dashboard information, and any information viewable through tester access.
2. Any information relating to users, sellers, buyers, customers, orders, payments, downloads, products, uploaded files, store names, account emails, or private platform activity.

Confidential Information does not need to be marked “confidential” to be protected under this Agreement. If the information is shared in connection with Asset Moth testing, pre-launch access, private development, private group chats, or unreleased website activity, it must be treated as confidential.
TXT,
        ],
    ];
}

function nda_tail_sections(): array
{
    return [
        'section_3' => [
            'title' => '3. Tester’s Confidentiality Obligations',
            'body' => <<<'TXT'
## 3. Tester’s Confidentiality Obligations

The Receiving Party agrees to keep all Confidential Information strictly confidential.

The Receiving Party agrees that they will not, directly or indirectly:

1. Discuss Asset Moth testing with anyone outside of the approved Asset Moth testing group.
2. Share any information about the website, build, features, plans, tools, layout, design, testing process, bugs, issues, timeline, launch plans, private discussions, or future plans with anyone outside of approved Asset Moth testers and Angela Rodgers.
3. Post about Asset Moth testing on Facebook, Instagram, TikTok, Threads, X/Twitter, Pinterest, YouTube, websites, blogs, groups, forums, Discord, Reddit, private chats, text messages, email, or any other public or private platform.
4. Share screenshots, screen recordings, photos, videos, copied text, documents, links, files, recordings, or any other materials connected to Asset Moth or private testing.
5. Show the website, dashboard, tester group chat, private messages, features, pages, bugs, tools, or any private materials to anyone else.
6. Describe, summarize, hint at, tease, or reveal Asset Moth’s private features, structure, ideas, systems, plans, or testing details.
7. Copy, recreate, clone, imitate, reverse engineer, duplicate, modify, adapt, build from, or use any Confidential Information for their own business, another business, another marketplace, another website, another platform, another product, another service, or any competing or similar project.
8. Use Confidential Information to help another person or business create, improve, launch, market, or develop a similar website, marketplace, platform, feature, service, product, or business idea.
9. Use Confidential Information for personal gain, competitive gain, public attention, content creation, marketing, drama, gossip, or any purpose other than approved Asset Moth testing.
10. Upload Confidential Information into AI tools, design tools, software, public databases, shared documents, or third-party platforms unless Angela Rodgers gives clear written permission first.
11. Add unauthorized people to testing spaces, forward private messages, copy private group chat content, or share private links.
12. Save, download, print, copy, export, or store Confidential Information except as necessary for approved testing and feedback.
13. Contact developers, testers, sellers, buyers, or other parties connected to Asset Moth for the purpose of obtaining private information, sharing private information, or bypassing Angela Rodgers.

The Receiving Party understands that “anyone outside of the approved testing group” includes, but is not limited to, spouses, partners, friends, family members, employees, contractors, customers, other designers, business owners, social media followers, group members, competitors, and online communities.
TXT,
        ],
        'section_4' => [
            'title' => '4. Approved Disclosure',
            'body' => <<<'TXT'
## 4. Approved Disclosure

The Receiving Party may only discuss Confidential Information with:

1. Angela Rodgers;
2. Approved Asset Moth admins, if any are clearly identified by Angela Rodgers;
3. Other approved Asset Moth testers inside the official Asset Moth testing group chat or approved testing space;
4. A legal or professional advisor only if necessary and only if that advisor is also required to keep the information confidential.

No other disclosure is allowed unless Angela Rodgers gives prior written permission.
TXT,
        ],
        'section_5' => [
            'title' => '5. No Public Posting or Private Sharing',
            'body' => <<<'TXT'
## 5. No Public Posting or Private Sharing

The Receiving Party agrees that they will not make any public or private post, comment, story, reel, live video, TikTok, YouTube video, blog post, podcast, group post, Discord message, Reddit post, email, newsletter, text message, private message, or any other communication that reveals, discusses, hints at, or references private Asset Moth testing details.

This includes vague posting, indirect posting, anonymous posting, or posting without naming Asset Moth if the information could reasonably be connected back to Asset Moth, Angela Rodgers, Diesel Designs, or the testing process.
TXT,
        ],
        'section_6' => [
            'title' => '6. No Screenshots, Screen Recordings, or Visual Sharing',
            'body' => <<<'TXT'
## 6. No Screenshots, Screen Recordings, or Visual Sharing

The Receiving Party agrees not to take, save, send, upload, post, or share screenshots, screen recordings, videos, photos, or visual captures of:

1. The Asset Moth website;
2. The tester dashboard;
3. Seller tools;
4. Buyer tools;
5. Product upload pages;
6. Checkout, payment, order, or download pages;
7. Private messages;
8. Facebook group chats;
9. Admin instructions;
10. Tester feedback;
11. Bug reports;
12. Unreleased branding, logos, graphics, mockups, features, layouts, or content.

Screenshots may only be taken if Angela Rodgers specifically requests them for testing or bug reporting. Any approved screenshots must be shared only with Angela Rodgers or inside the approved Asset Moth testing space.
TXT,
        ],
        'section_7' => [
            'title' => '7. Use of Information Is Limited to Testing Only',
            'body' => <<<'TXT'
## 7. Use of Information Is Limited to Testing Only

The Receiving Party may use Confidential Information only for the purpose of participating in approved Asset Moth testing.

The Receiving Party may not use Confidential Information for any other purpose, including but not limited to:

1. Creating a competing or similar website;
2. Creating a competing or similar marketplace;
3. Helping another person create a competing or similar marketplace;
4. Improving another business, product, platform, website, or service;
5. Building content, graphics, posts, ads, websites, tools, courses, templates, digital products, or services based on Asset Moth’s private information;
6. Gaining a business advantage over Angela Rodgers, Diesel Designs, Asset Moth, other testers, sellers, or future users.
TXT,
        ],
        'section_8' => [
            'title' => '8. Ownership of Confidential Information',
            'body' => <<<'TXT'
## 8. Ownership of Confidential Information

All Confidential Information remains the sole property of Angela Rodgers, Diesel Designs, Asset Moth, or the rightful owner of the information.

Nothing in this Agreement gives the Receiving Party any ownership rights, license, claim, interest, permission, or control over Asset Moth, its website, branding, content, structure, ideas, features, tools, systems, plans, code, designs, documents, business model, policies, or related materials.

The Receiving Party acknowledges that participation as a tester does not give them ownership in Asset Moth, partnership rights, employment rights, decision-making rights, profit rights, equity rights, or any other business interest.
TXT,
        ],
        'section_9' => [
            'title' => '9. Feedback, Suggestions & Required Participation',
            'body' => <<<'TXT'
## 9. Feedback, Suggestions & Required Participation

The Receiving Party may provide feedback, ideas, suggestions, bug reports, comments, recommendations, feature requests, or improvement ideas during testing.

The Receiving Party agrees that Angela Rodgers and Asset Moth may use, modify, reject, implement, publish, or build upon any feedback or suggestions provided during testing without owing payment, credit, ownership, royalties, approval, or additional permission to the Receiving Party.

The Receiving Party understands that providing feedback does not give them ownership over Asset Moth, any feature, any improvement, any website change, or any future version of the platform.

The Receiving Party understands that active testing and meaningful feedback are required parts of participation in the private testing phase.

If the Receiving Party does not complete required testing tasks, does not provide requested feedback, does not report issues in good faith, becomes inactive, fails to communicate, or otherwise does not participate as reasonably required during the testing phase, Angela Rodgers may remove the Receiving Party from testing.

If the Receiving Party is removed from the testing phase for lack of participation, lack of required feedback, inactivity, failure to communicate, unprofessional behavior, suspected confidentiality concerns, or breach of this Agreement, the Receiving Party may lose Founding Member status and any related rewards, perks, or benefits.

Removal from testing, loss of Founding Member status, or loss of tester-related perks does not end this Agreement or release the Receiving Party from any confidentiality, non-disclosure, non-use, or other obligations under this Agreement.
TXT,
        ],
        'section_10' => [
            'title' => '10. Tester Participation, Purchases, Founding Member Status & No Monetary Compensation',
            'body' => <<<'TXT'
## 10. Tester Participation, Purchases, Founding Member Status & No Monetary Compensation

The Receiving Party understands that testing may require participation in website activities such as creating an account, building a seller profile, uploading test products, browsing products, making small purchases, testing orders, testing downloads, testing payments, reporting bugs, and providing feedback.

The Receiving Party understands and agrees that participation in Alpha testing, Beta testing, or any related private testing phase is voluntary and does not create an employment relationship, contractor relationship, partnership, agency relationship, investment relationship, co-ownership relationship, or representative relationship with Angela Rodgers, Diesel Designs, or Asset Moth.

The Receiving Party understands and agrees that there is no monetary compensation for participation in this testing phase unless Angela Rodgers separately agrees in writing.

The Receiving Party is not entitled to wages, hourly pay, salary, reimbursement, commission, profit sharing, ownership, equity, royalties, or cash compensation for participating in testing, providing feedback, reporting bugs, uploading test products, making test purchases, or helping evaluate the website.

In exchange for approved participation in the private testing phase, and provided the Receiving Party participates in good faith and remains in compliance with this Agreement, the Receiving Party will be granted Asset Moth Founding Member status and the rewards, perks, or benefits associated with that status as made available by Angela Rodgers or Asset Moth.

Founding Member status, rewards, perks, and benefits are non-monetary tester-related benefits. They do not create employment, ownership, partnership, equity, profit-sharing rights, payment rights, or any guarantee of future compensation.

Angela Rodgers may reasonably adjust the timing, delivery method, format, or details of Founding Member rewards, perks, or benefits as needed for business, technical, launch, or platform reasons, but this does not remove the Receiving Party’s confidentiality obligations under this Agreement.
TXT,
        ],
        'section_11' => [
            'title' => '11. Security and Account Responsibility',
            'body' => <<<'TXT'
## 11. Security and Account Responsibility

The Receiving Party agrees to protect any login information, private links, passwords, access codes, test accounts, or account credentials provided for Asset Moth testing.

The Receiving Party agrees not to share access with anyone else.

The Receiving Party is responsible for activity that occurs under their account or through their access, unless they can show the activity was caused by unauthorized access that they reported immediately.

The Receiving Party must immediately notify Angela Rodgers if they believe:

1. Their account has been accessed by someone else;
2. A private link was shared accidentally;
3. A screenshot, recording, message, file, or document was sent to the wrong person;
4. Confidential Information may have been exposed;
5. Another tester may have violated confidentiality.
TXT,
        ],
        'section_12' => [
            'title' => '12. Return or Destruction of Confidential Information',
            'body' => <<<'TXT'
## 12. Return or Destruction of Confidential Information

Upon request by Angela Rodgers, or upon the end of the Receiving Party’s participation in testing, the Receiving Party agrees to immediately return, delete, or destroy all Confidential Information in their possession or control.

This includes screenshots, screen recordings, saved messages, copied text, notes, documents, downloads, files, private links, login information, printed materials, and any other copies of Confidential Information.

The Receiving Party must confirm in writing that the information has been deleted or destroyed if Angela Rodgers requests confirmation.
TXT,
        ],
        'section_13' => [
            'title' => '13. Duration of Confidentiality',
            'body' => <<<'TXT'
## 13. Duration of Confidentiality

This Agreement begins on the Effective Date and remains valid and enforceable for eight (8) years from the date the Receiving Party signs this Agreement electronically.

The Receiving Party’s confidentiality obligations, non-disclosure obligations, non-use obligations, screenshot/screen-recording restrictions, private-sharing restrictions, and all related obligations under this Agreement continue for the full eight (8) year term.

The Receiving Party remains bound by this Agreement for the full eight (8) year term even if they quit testing, are removed from testing, are removed from any group chat, lose website access, lose Founding Member status, lose tester-related perks, fail to complete the testing phase, or stop participating for any reason.

During the eight (8) year term, the Receiving Party must continue to keep Confidential Information private and must not discuss, share, post, leak, copy, recreate, use, or disclose Confidential Information except as expressly allowed by this Agreement.

Private tester discussions, private group chat content, private messages, bug reports, tester identities, testing issues, business strategy, unreleased roadmap details, and non-public internal decisions remain confidential during the full eight (8) year term unless Angela Rodgers clearly releases that specific information in writing.

To the extent any Confidential Information is also protected by trade secret law, intellectual property law, privacy law, contract law, or any other applicable legal protection, nothing in this section is intended to waive or limit any rights or remedies that may exist under those laws.
TXT,
        ],
        'section_14' => [
            'title' => '14. Information Not Covered',
            'body' => <<<'TXT'
## 14. Information Not Covered

Confidential Information does not include information that the Receiving Party can prove:

1. Was already publicly known through no fault of the Receiving Party;
2. Was lawfully known by the Receiving Party before it was shared by Angela Rodgers;
3. Was lawfully received from another source who had the right to share it;
4. Was independently developed by the Receiving Party without using or relying on Asset Moth Confidential Information;
5. Was released publicly by Angela Rodgers or Asset Moth without restriction.

Information does not become non-confidential simply because part of it becomes public. Any non-public details, private discussions, testing details, unreleased features, internal reasoning, bugs, future plans, business strategy, and private context remain confidential.
TXT,
        ],
        'section_15' => [
            'title' => '15. Required Legal Disclosure',
            'body' => <<<'TXT'
## 15. Required Legal Disclosure

If the Receiving Party is required by law, court order, subpoena, or government request to disclose any Confidential Information, the Receiving Party must notify Angela Rodgers in writing as soon as legally allowed.

The Receiving Party agrees to disclose only the portion of Confidential Information legally required and to take reasonable steps to help protect the confidentiality of the remaining information.
TXT,
        ],
        'section_16' => [
            'title' => '16. Protected Legal Rights',
            'body' => <<<'TXT'
## 16. Protected Legal Rights

Nothing in this Agreement prevents the Receiving Party from reporting possible legal violations to government agencies, responding truthfully to legal process, participating in legally protected activity, or exercising rights that cannot legally be waived.

This Agreement is not intended to prevent lawful whistleblowing, legally protected reporting, or disclosures that are protected by applicable law.
TXT,
        ],
        'section_17' => [
            'title' => '17. Breach of Agreement',
            'body' => <<<'TXT'
## 17. Breach of Agreement

A breach of this Agreement includes, but is not limited to:

1. Sharing Asset Moth information with anyone outside the approved testing group;
2. Posting about private Asset Moth testing;
3. Sharing screenshots, recordings, links, messages, documents, or website access;
4. Discussing private features, plans, tools, layouts, bugs, launch details, or private business plans;
5. Using Asset Moth information to create or help create a competing or similar idea, website, marketplace, product, service, feature, or business;
6. Allowing someone else to access the testing website or group chat;
7. Failing to delete or return Confidential Information when requested;
8. Any other unauthorized use or disclosure of Confidential Information.

The Receiving Party understands that a breach of this Agreement may cause serious and potentially irreparable harm to Angela Rodgers, Diesel Designs, and Asset Moth.
TXT,
        ],
        'section_18' => [
            'title' => '18. Legal Remedies and Enforcement',
            'body' => <<<'TXT'
## 18. Legal Remedies and Enforcement

If the Receiving Party breaches or threatens to breach this Agreement, Angela Rodgers reserves the right to take legal action to protect herself, Diesel Designs, Asset Moth, the website, the business, the platform, the marketplace, and all related Confidential Information.

Available remedies may include, but are not limited to:

1. Immediate removal from Alpha testing, Beta testing, group chats, website access, and any Asset Moth tester perks or benefits;
2. Termination of any Founding Member badge or tester-related benefits;
3. Written demand to stop disclosure or misuse;
4. Written demand to delete, return, or destroy Confidential Information;
5. Injunctive relief or court orders to stop disclosure, misuse, copying, or continued harm;
6. Recovery of damages caused by the breach;
7. Recovery of profits or benefits gained from misuse of Confidential Information;
8. Recovery of attorney fees and legal costs where allowed by law or court order;
9. Any other remedies available under applicable law.

The Receiving Party agrees that money damages may not be enough to fully repair the harm caused by unauthorized disclosure or misuse of Confidential Information, and that Angela Rodgers may seek immediate court relief to prevent or stop further harm.
TXT,
        ],
        'section_19' => [
            'title' => '19. No Waiver',
            'body' => <<<'TXT'
## 19. No Waiver

If Angela Rodgers does not immediately enforce any part of this Agreement, that does not mean she gives up the right to enforce it later.

Any waiver must be in writing and signed by Angela Rodgers.
TXT,
        ],
        'section_20' => [
            'title' => '20. No Public Announcement',
            'body' => <<<'TXT'
## 20. No Public Announcement

The Receiving Party may not publicly announce, imply, suggest, or claim that they are an Asset Moth tester, Founding Member, Alpha tester, Beta tester, partner, insider, early member, approved seller, or connected participant unless Angela Rodgers gives written permission or publicly announces the tester group herself.

After public launch, the Receiving Party may only publicly share information that Angela Rodgers or Asset Moth has already made public, unless given written permission to share more.
TXT,
        ],
        'section_21' => [
            'title' => '21. No Guarantee of Access or Continued Participation',
            'body' => <<<'TXT'
## 21. No Guarantee of Access or Continued Participation

Angela Rodgers may remove the Receiving Party from testing at any time for any reason, including but not limited to lack of participation, lack of communication, failure to provide required testing feedback, failure to complete requested testing tasks, suspected confidentiality concerns, unprofessional behavior, conflict of interest, breach of this Agreement, or business needs.

Removal from testing, quitting testing, losing access, failing to complete testing, or losing Founding Member status does not end this Agreement and does not release the Receiving Party from confidentiality, non-disclosure, non-use, screenshot/screen-recording restrictions, private-sharing restrictions, or any other obligations under this Agreement.

If the Receiving Party is removed for lack of required participation, lack of required feedback, inactivity, failure to communicate, unprofessional behavior, suspected confidentiality concerns, or breach of this Agreement, they may lose Founding Member status and any related tester perks, rewards, or benefits.
TXT,
        ],
        'section_22' => [
            'title' => '22. Governing Law',
            'body' => <<<'TXT'
## 22. Governing Law

This Agreement will be governed by and interpreted under the laws of the State of Michigan, without regard to conflict of law rules.

Any legal action related to this Agreement will be brought in a court with proper jurisdiction in Michigan, unless another venue is required by law.
TXT,
        ],
        'section_23' => [
            'title' => '23. Entire Agreement',
            'body' => <<<'TXT'
## 23. Entire Agreement

This Agreement is the entire agreement between the Parties regarding confidentiality and non-disclosure for Asset Moth testing.

This Agreement replaces any prior verbal or written discussions about confidentiality related to Asset Moth testing.

Any changes to this Agreement must be in writing and signed by both Parties.
TXT,
        ],
        'section_24' => [
            'title' => '24. Severability',
            'body' => <<<'TXT'
## 24. Severability

If any part of this Agreement is found to be invalid, illegal, or unenforceable, the remaining parts of the Agreement will still remain in effect.

The invalid or unenforceable part may be revised by a court or replaced with a valid provision that most closely matches the original intent.
TXT,
        ],
        'section_25' => [
            'title' => '25. Electronic Signature',
            'body' => <<<'TXT'
## 25. Electronic Signature

The Parties agree that this Agreement may be signed electronically. Electronic signatures, typed names, scanned signatures, digital signatures, or signed PDF copies will have the same legal effect as original signatures.
TXT,
        ],
        'signatures' => [
            'title' => 'Signatures & Legal Acknowledgment',
            'body' => <<<'TXT'
# SIGNATURES & LEGAL ACKNOWLEDGMENT

By completing and submitting the electronic signature fields on this form, the Receiving Party confirms that they have read, understood, and agreed to this Confidentiality and Non-Disclosure Agreement in full.

The Receiving Party further acknowledges and understands that any violation of this Agreement may result in immediate removal from Asset Moth testing, loss of tester-related perks or benefits, loss of Founding Member-related benefits, and legal action by Angela Rodgers to protect herself, Diesel Designs, Asset Moth, and all related confidential, proprietary, and business-sensitive information.

The Receiving Party understands and agrees that legal action may include, but is not limited to, claims for damages, injunctive relief, recovery of legal costs where allowed by law, and any other remedies available under applicable law.

The Receiving Party understands that by signing this Agreement, they are agreeing not to discuss, share, post, leak, copy, recreate, use, or disclose any protected Asset Moth information with anyone outside of approved Asset Moth testers, approved Asset Moth admins, and Angela Rodgers.

The signed NDA record will include the Receiving Party’s submitted legal information, business details, requested testing phase, optional vouching designer information if provided, initials, legal acknowledgments, typed electronic signature name, drawn electronic signature, IP address, user agent, and submission timestamp.
TXT,
        ],
    ];
}

function all_nda_sections(): array
{
    return nda_sections() + nda_tail_sections();
}

function snapshot_value(array $data, string $key): string
{
    $value = $data[$key] ?? '';

    if (is_array($value)) {
        return '';
    }

    return trim((string) $value);
}

function signed_tester_information_block(array $data): string
{
    if ($data === []) {
        return '';
    }

    $testingPhase = snapshot_value($data, 'testing_phase');

    $lines = [
        '# SIGNED TESTER INFORMATION CAPTURED WITH THIS NDA',
        '',
        'Legal Name: ' . snapshot_value($data, 'legal_name'),
        'Business Name, if applicable: ' . snapshot_value($data, 'business_name'),
        'Email: ' . snapshot_value($data, 'email'),
        'Facebook Name/Profile: ' . snapshot_value($data, 'facebook_profile'),
        'Testing Phase Requested: ' . ($testingPhase !== '' ? $testingPhase : 'Not provided'),
        'Typed Electronic Signature Name: ' . snapshot_value($data, 'typed_signature_name'),
    ];

    $vouchingFields = [
        'vouching_designer_name' => 'Name of Designer Vouching for Tester',
        'vouching_designer_business' => 'Vouching Designer Business Name',
        'vouching_designer_facebook' => 'Vouching Designer Facebook/Profile URL',
        'vouching_designer_email' => 'Vouching Designer Email',
        'vouching_designer_relationship' => 'Relationship to Tester',
    ];

    $vouchingLines = [];

    foreach ($vouchingFields as $key => $label) {
        $value = snapshot_value($data, $key);

        if ($value !== '') {
            $vouchingLines[] = $label . ': ' . $value;
        }
    }

    if ($vouchingLines !== []) {
        $lines[] = '';
        $lines[] = '## Optional Witness / Vouching Designer Information';
        $lines[] = '';
        $lines = array_merge($lines, $vouchingLines);
    }

    return implode("\n", $lines);
}

function nda_text_snapshot(array $data = []): string
{
    $snapshot = '';

    foreach (all_nda_sections() as $key => $section) {
        $snapshot .= $section['body'] . "\n\n";

        if ($key === 'opening') {
            $signedTesterInfo = signed_tester_information_block($data);

            if ($signedTesterInfo !== '') {
                $snapshot .= $signedTesterInfo . "\n\n";
            }
        }

        $snapshot .= "---\n\n";
    }

    return $snapshot;
}

function nda_text_hash(array $data = []): string
{
    return hash('sha256', nda_text_snapshot($data));
}

function render_markdownish_inline(string $text): string
{
    $html = h($text);

    return preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $html);
}

function render_markdownish(string $text): string
{
    $blocks = preg_split("/\R{2,}/", trim($text));
    $htmlBlocks = [];

    foreach ($blocks as $block) {
        $block = trim($block);

        if ($block === '') {
            continue;
        }

        if ($block === '---') {
            $htmlBlocks[] = '<hr>';
            continue;
        }

        if (preg_match('/^###\s+(.+)$/s', $block, $match)) {
            $htmlBlocks[] = '<h4>' . render_markdownish_inline($match[1]) . '</h4>';
            continue;
        }

        if (preg_match('/^##\s+(.+)$/s', $block, $match)) {
            $htmlBlocks[] = '<h3>' . render_markdownish_inline($match[1]) . '</h3>';
            continue;
        }

        if (preg_match('/^#\s+(.+)$/s', $block, $match)) {
            $htmlBlocks[] = '<h2>' . render_markdownish_inline($match[1]) . '</h2>';
            continue;
        }

        $lines = preg_split('/\R/', $block);
        $listItems = [];
        $allNumbered = true;

        foreach ($lines as $line) {
            if (preg_match('/^\d+\.\s+(.+)$/', trim($line), $match)) {
                $listItems[] = '<li>' . render_markdownish_inline($match[1]) . '</li>';
            } else {
                $allNumbered = false;
                break;
            }
        }

        if ($allNumbered && $listItems !== []) {
            $htmlBlocks[] = '<ol>' . implode('', $listItems) . '</ol>';
            continue;
        }

        $escapedLines = array_map('render_markdownish_inline', $lines);
        $htmlBlocks[] = '<p>' . implode('<br>', $escapedLines) . '</p>';
    }

    return implode("\n", $htmlBlocks);
}
