=== Member Directory ===
Contributors: hazrathali
Tags: members, teams, directory, contact form, custom post type
Requires at least: 5.5
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple and flexible WordPress plugin to manage members and associate them with multiple teams.

== Description ==

**Member Directory** is a custom WordPress plugin that helps you create a searchable member directory where each member can be associated with multiple teams. It includes frontend profile pages, team listings, and a contact form system with email notifications and admin storage.

### Features:
- Custom Post Types for Members and Teams
- Custom meta fields for member details:
  - First Name, Last Name, Email, Address
  - Profile and Cover Image
  - Favorite Color (color picker)
  - Status: Active or Draft
- Prevents duplicate member emails
- Associate a member with multiple teams
- Display all members and teams via shortcode or template
- Single Member Page at `/first-name_last-name`
- Contact Form on each member profile
  - Sends email to the member
  - Stores message in admin dashboard
- View total contact submissions in admin list table

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Go to **Members** and **Teams** in your dashboard to begin adding data.
4. Use shortcodes `[all_members]` and `[all_teams]` to display directories.

== Usage ==

- Use the "Members" and "Teams" menus in admin to add entries.
- Associate members with teams using the "Associated Teams" box.
- Embed member and team listings using shortcodes or templates.
- Visit `/first-name_last-name` to view a member's public profile.

== Shortcodes ==

`[all_members]`  
Displays a list of all members with Active status.

`[all_teams]`  
Displays a list of all teams.

== Frequently Asked Questions ==

= Can members belong to more than one team? =
Yes, each member can be assigned to multiple teams.

= Are emails stored or sent to members? =
Yes. Contact form submissions are both emailed to the member and stored in the admin dashboard.

= How can I style the output? =
The plugin includes minimal HTML. You can override templates or apply custom CSS in your theme.

== Screenshots ==

1. Admin interface showing member meta fields
2. Frontend member profile page
3. Contact form on member page
4. Team page listing associated members

== Changelog ==

= 1.0 =
* Initial release with full feature set.

== Upgrade Notice ==

= 1.0 =
First version of the plugin.

== License ==

This plugin is licensed under the GPLv2 or later.
