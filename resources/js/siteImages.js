import { siteImage } from '@/utils/siteImage';

/** Labeled folders under public/images — matches design exports per page. */
export const home = {
    hero: siteImage('Home page/Hero.png'),
    joinSunday: siteImage('Home page/Untitled design (18).png'),
    kids: siteImage('Home page/Kids.png'),
    youth: siteImage('Home page/Youth.png'),
    whatToExpect: siteImage('Home page/What to expect.png'),
    getConnected: siteImage('Home page/Get connected.png'),
    meetTeam: siteImage('Home page/Team.png'),
    footerCta: siteImage('Home page/Footer.png'),
};

/** Start Here page image map */
export const startHere = {
    hero: siteImage('Start Here/start-here-adult-groups.png'),
    joinSunday: siteImage('Start Here/ESC.jpg'),
    whatToExpect: siteImage('Start Here/Your paragraph text (15).png'),
    ministryKids: siteImage('Home page/Kids.png'),
    ministryYouth: siteImage('Media/start-here-youth-ministry.png'),
    ministryAdult: siteImage('Start Here/start-here-adult-groups.png'),
    walkAlone: siteImage('Start Here/start-here-walk-alone.png'),
};

export const connect = {
    hero: siteImage('Connect/Untitled design (37).png'),
    comeAsYouAre: siteImage('Connect/Untitled design (36).png'),
};

export const whoWeAre = {
    hero: siteImage('Who We Are/Hero.png'),
    purpose: siteImage('Who We Are/Your paragraph text (21).png'),
    mission: siteImage('Who We Are/Your paragraph text (17).png'),
    vision: siteImage('Who We Are/Your paragraph text (19).png'),
    welcome: siteImage('Who We Are/Untitled design (22).png'),
    elderNate: siteImage('Who We Are/4I3A9394.jpg'),
    elderJeff: siteImage('Who We Are/Jeff Marble.jpg'),
    elderJohn: siteImage('Who We Are/Goasdone, John.jpg'),
};

export const ministryTeam = [
    { name: 'Justin Dunning', title: 'Ministry', photo: siteImage('Who We Are/4I3A9373.jpg') },
    { name: 'Noelle Hobson', title: 'Ministry', photo: siteImage('Who We Are/4I3A9376.jpg') },
    { name: 'Neil Mohler', title: 'Ministry', photo: siteImage('Who We Are/4I3A9380.jpg') },
    { name: 'Tyler Paulson', title: 'Ministry', photo: siteImage('Who We Are/Tyler Paulson.jpg') },
    { name: 'Maddie Sager', title: 'Ministry', photo: siteImage('Who We Are/4I3A9390.jpg') },
    { name: 'Bob Searer', title: 'Ministry', photo: siteImage('Who We Are/4I3A9386.jpg') },
];

export const ministries = {
    hero: siteImage('Ministries Landing/Untitled design (25).png'),
    kids: siteImage('Home page/Kids.png'),
    youth: siteImage('Home page/Youth.png'),
    adults: siteImage('Home page/Get connected.png'),
    youBelong: siteImage('Ministries Landing/Untitled design (27).png'),
};

export const kidsMinistry = {
    hero: siteImage('Kids Ministry/Untitled design (30).png'),
    /** Add `public/images/Kids Ministry/CBC Jr Camp promo.png` when artwork is ready. */
    cbcJrCampPromo: siteImage('Kids Ministry/CBC Jr Camp promo.png'),
    intro: siteImage('Kids Ministry/Your paragraph text (1).png'),
    whatToExpect: siteImage('Kids Ministry/Untitled design (29).png'),
    cta: siteImage('Kids Ministry/Untitled design (31).png'),
    experience: [
        siteImage('Kids Ministry/Bible.png'),
        siteImage('Kids Ministry/Leader.png'),
        siteImage('Kids Ministry/Friendships.png'),
        siteImage('Kids Ministry/Faith.png'),
    ],
};

export const adultGroups = {
    hero: siteImage('Adult Groups/Untitled design (15).png'),
    intro: siteImage('Adult Groups/Untitled design (16).png'),
    whatToExpect: siteImage('Adult Groups/Untitled design (17).png'),
    cta: siteImage('Adult Groups/Untitled design (20).png'),
    experience: [
        siteImage('Adult Groups/Relationships.png'),
        siteImage('Adult Groups/Bible .png'),
        siteImage('Adult Groups/Encouragement.png'),
        siteImage('Adult Groups/Belonging.png'),
    ],
};

export const youthMinistry = {
    hero: siteImage('Youth Ministry/Untitled design (15).png'),
    intro: siteImage('Youth Ministry/Untitled design (16).png'),
    whatToExpect: siteImage('Youth Ministry/Untitled design (17).png'),
    cta: siteImage('Youth Ministry/Your paragraph text.png'),
    experience: [
        siteImage('Youth Ministry/Community.png'),
        siteImage('Youth Ministry/Bible .png'),
        siteImage('Youth Ministry/Encouragement.png'),
        siteImage('Youth Ministry/Leadership Ops.png'),
    ],
};

export const media = {
    hero: siteImage('Media/start-here-youth-ministry.png'),
    /** Latest message placeholder (“coming soon” graphic). */
    featured: siteImage('Media/Untitled design (35).png'),
    /** Building / exterior — only two files in Media; use general photo for Sunday section. */
    joinSunday: siteImage('photos/nlbc-3.jpg'),
    comeAsYouAre: siteImage('Connect/Untitled design (36).png'),
};
