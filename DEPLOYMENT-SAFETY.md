# HighEnd Blinds deployment safety

This repository must remain synchronized with the active **HighEnd Blinds Recovered** WordPress theme.

Before uploading or deploying:

1. Back up the live theme files and WordPress database.
2. Compare the live theme with this repository.
3. Run `bash scripts/validate-theme.sh`.
4. Confirm the homepage and every product page on a staging or preview URL.
5. Deploy only after the comparison shows that no newer live files will be overwritten.

Never upload an older theme archive over the live theme. WordPress page records may remain in the database while older theme templates make their enhanced content appear missing.

The motorized-curtain product is handheld-remote controlled only. Do not advertise applications, voice control, schedules, scenes, or home automation for motorized curtains.
