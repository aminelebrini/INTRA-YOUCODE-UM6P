<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\AnnouncementService;

class AnnouncementController extends Controller
{
    private $announcementService;
    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
    }
    public function createAnnouncement(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'cible' => 'required|string|max:255',
        ]);

        $announcement = $this->announcementService->createAnnouncement(
            $request->titre,
            $request->description,
            $request->status,
            $request->categorie,
            $request->cible
        );

        if ($announcement) {
            return response()->json(['message' => 'Announcement created successfully', 'announcement' => $announcement], 201);
        } else {
            return response()->json(['message' => 'Failed to create announcement'], 500);
        }
    }
    public function getAnnouncements()
    {
        $announcements = $this->announcementService->getAnnouncements();
        return response()->json(['announcements' => $announcements], 200);
    }

    public function updateAnnouncement(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:annances,id',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'cible' => 'required|string|max:255',
        ]);

        $announcement = $this->announcementService->updateAnnouncement(
            $request->id,
            $request->titre,
            $request->description,
            $request->status,
            $request->categorie,
            $request->cible
        );

        if ($announcement) {
            return response()->json(['message' => 'Announcement updated successfully', 'announcement' => $announcement], 200);
        }

        return response()->json(['message' => 'Failed to update announcement'], 500);
    }
}
